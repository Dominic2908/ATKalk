<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Customer;
use App\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/customer', name: 'app_customer')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        
        $customer = new Customer();
        
        $options =  'app_customer';
        
        $customers =  $doctrine->getRepository(Customer::class)->findAll();
        
        //$template = $request->isXmlHttpRequest() ? '_form.html.twig' : 'new.html.twig';
        
        return $this->renderForm('customer/index.html.twig', [
            
            'customers' => $customers,
            'options' => $options,
        ]);
    }
    
    #[Route('/new', name: 'new_customer')]
    public function newCustomer(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        
        $customer = new Customer();
        
        $form = $this->createForm(CustomerType::class, $customer);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $customer = $form->getData();
            
            $entityManager->persist($customer);
            
            $options =  'new_customer';
            
            $entityManager->flush();
            
            return $this->redirectToRoute('app_customer');
        }
        
        $options =  'new_customer';
        //$data = phpinfo();
        return $this->renderForm('customer/new.html.twig', [
            'form' => $form,
            'options' => $options,
        ]);
    }
    
    #[Route("/{id}/edit", name: 'edit_customer')]
    public function customerEdit(ManagerRegistry $doctrine, int $id,  Request $request):Response
    {
        $customerEdit = $doctrine->getRepository(Customer::class)->find($id);
        $entityManager = $doctrine->getManager();
        $form = $this->createForm(CustomerType::class, $customerEdit);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $customer = $form->getData();
            
            $entityManager->persist($customer);
            
            $options =  'edit_customer';
            
            $entityManager->flush();
            
            return $this->redirectToRoute('app_customer');
        }
        
        $options =  'edit_customer';
        
        return $this->renderForm('customer/edit.html.twig', [
            //'data' => $data,
            'form' => $form,
            'customers' => $customerEdit,
            'options' => $options,
        ]);
    }
    
    #[Route("/delete/{id}", name:"del_customer", methods:"POST|GET")]
    public function customerDel(ManagerRegistry $doctrine, Request $request, Customer $customer):Response 
    {
       
        $customerDel = $doctrine->getRepository(Customer::class)->remove($customer);
        $entityManager = $doctrine->getManager();
        $entityManager->flush();
        
        $customers =  $doctrine->getRepository(Customer::class)->findAll();
        
        $options =  'del_customer';
        
        return $this->renderForm('customer/index.html.twig', [
            
            'customers' => $customers,
            'options' => $options,
        ]);
    }
    
}
