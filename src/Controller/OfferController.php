<?php

namespace App\Controller;

use App\Services\OfferService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Offer;
use App\Form\OfferType;
use App\Form\OrderListType;
use App\Entity\OrderList;
use Doctrine\Persistence\ManagerRegistry;

class OfferController extends AbstractController
{
    private $offerService;
    
    public function __construct(OfferService $offerService)
    {
        $this->offerService = $offerService;
    }
    
    #[Route('/offer', name: 'app_offer')]
    public function index(): Response
    {
        
        return $this->render('offer/index.html.twig', [
            'controller_name' => 'MaterialManagementController',
        ]);
    }
    
    #[Route('/offer/offerList', name: 'app_offer_offerList')]
    public function productList():Response
    {
        $offers = $this->offerService->getOffers();
        
        $date = date_create();
        
        $test = date_timestamp_get($date);
        
        return $this->render('offer/index.html.twig', [
            
            'offers' => $offers,
            'test' => date_timestamp_get($date),
        ]);
    }
    
    #[Route('/offer/newOffer', name: 'app_offer_newOffer')]
    public function newProduct(Request $request, ManagerRegistry $doctrine):Response
    {
        
        $offer = new Offer();
        
        $orderList = new OrderList();
        
        $form2 = $this->createForm(OrderListType::class, $orderList);
        
        $form = $this->createForm(OfferType::class, $offer);
        
        $form->handleRequest($request);
        
        $form2->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $offer = $form->getData();
            
            $this->offerService->newOffer($offer);
            
            
            return $this->redirectToRoute('app_offer_offerList');
        }
        
        if ($form2->isSubmitted() && $form2->isValid()) {
            
            $offer = $form->getData();
            
            $entityManager = $doctrine->getManager();
            
            $entityManager->persist($orderList);
            
            $entityManager->flush();
        }
        
        return $this->renderForm('offer/newOffer.html.twig', [
            
            'form1' => $form,
            'form2' => $form2,
        ]);
    }
    
    #[Route('/offer/{id}/editOffer', name: 'app_offer_editOffer')]
    public function offertEdit(Request $request, Offer $offer):Response
    {
        $offerEdit = $this->offerService->editOffer($offer);
        $form = $this->createForm(OfferType::class, $offer);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $offer = $form->getData();
            
            $this->offerService->newOffer($offer);
            
            return $this->redirectToRoute('app_offer_offerList');
        }
        
        //$options =  'edit_customer';
        
        return $this->renderForm('offer/editOffer.html.twig', [
            //'data' => $data,
            'form' => $form,
            'offers' => $offerEdit,
            //'options' => $options,
        ]);
    }
    
    #[Route('/product/{id}/delProduct', name: 'app_offer_delOffer')]
    public function offerDel(Request $request, Offer $offer):Response
    {
        
        $offers = $this->offerService->delProduct($offer);
        
        //$options =  'edit_customer';
        
        return $this->renderForm('offer/index.html.twig', [
            
            'offers' => $offers,
            //'options' => $options,
        ]);
    }
}
