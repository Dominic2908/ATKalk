<?php

namespace App\Controller;

use App\Services\OfferService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Offer;
use App\Entity\Customer;
use App\Form\CustomerType;
use App\Form\OfferType;
use App\Form\OrderListType;
use App\Entity\OrderList;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Context\Normalizer\ObjectNormalizerContextBuilder;
use App\Domain\Offer\OfferData;



class OfferController extends AbstractController
{
    private $offerService;
    
    private $serializer;
    
    public function __construct(OfferService $offerService, SerializerInterface $serializer)
    {
        $this->offerService = $offerService;
        $this->serializer = $serializer;
    }
    
    #[Route('/offer', name: 'app_offer')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        
        $customerId = $request->request->get("id");
       
        $entityManager = $doctrine->getManager();
        
        $customers = new Customer();
        
        $customers =  $doctrine->getRepository(Customer::class)->find($customerId);
                
        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) { 
            
            $customers = $this->serializer->serialize($customers, 'json');
            
            return new JsonResponse(json_decode($customers));
        
        } else {
            
            return $this->render('offer/newOffer.html.twig');
        
        } 
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
    
    
    /**
     * 
     * @param Request $request
     * @param ManagerRegistry $doctrine
     * @return Response
     */
    #[Route('/offer/newOffer', name: 'app_offer_newOffer')]
    public function newProduct(Request $request, ManagerRegistry $doctrine):Response
    {
        
        $offer = new Offer();       
        
        $date = date_create();
        
        $offer->setOrderListNumber(date_timestamp_get($date));
        
        $customer = new Customer();
        
        $form = $this->createForm(OfferType::class, $offer);
        
        $form->handleRequest($request);       
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $offer = $form->getData();

            
            $customer = $offer->getCustomer();
            
            $this->offerService->newOffer($offer, $customer);
                        
            return $this->redirectToRoute('app_offer_offerList');
        }
        
        $customer_data = $this->offerService->getCustomerData();
 
        return $this->renderForm('offer/newOffer.html.twig', [
            
            'form' => $form,
            'customer_data' => $customer_data,
            
        ]);
    }
    
    
    /**
     * 
     * @param Request $request
     * @param Offer $offer
     * @param Customer $customer
     * @return Response
     */
    #[Route('/offer/{id}/editOffer', name: 'app_offer_editOffer')]
    
    public function offertEdit(Request $request, Offer $offer):Response
    {
        $customer = new Customer();
        
        $offerEdit = $this->offerService->editOffer($offer);
        
        $offer->setCustomer($offerEdit->getCustomer());
        
        $form = $this->createForm(OfferType::class, $offer);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $offer = $form->getData();
            
            $this->offerService->newOffer($offer);
            
            return $this->redirectToRoute('app_offer_offerList');
        }
        
        //$options =  'edit_customer';
        
        $offerEdit = $this->serializer->serialize($offerEdit, 'json');
        
        return $this->renderForm('offer/editOffer.html.twig', [
            //'data' => $data,
            'form' => $form,
            'offers' => json_decode($offerEdit),
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
