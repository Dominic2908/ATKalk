<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ProductService;
use App\Form\ProductType;
use App\Entity\Product;


class ProductController extends AbstractController
{
    private $matmanserv;
    
    public function __construct(ProductService $matmanserv)
    {
        $this->matmanserv = $matmanserv;
    }
    
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        
        return $this->render('product/index.html.twig', [
            'controller_name' => 'MaterialManagementController',
        ]);
    }
    
    #[Route('/product/productList', name: 'app_product_productList')]
    public function productList():Response
    {
        $products = $this->matmanserv->getProducts();
        
        return $this->render('product/index.html.twig', [
            
            'products' => $products,
        ]);
    }
    
    #[Route('/product/newProduct', name: 'app_product_newProduct')]
    public function newProduct(Request $request):Response
    {
        
        $product = new Product();
        
        $form = $this->createForm(ProductType::class, $product);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $product = $form->getData();
            
            $this->matmanserv->newProduct($product);
            
            return $this->redirectToRoute('app_product_productList');
        }
        
        return $this->renderForm('product/newProduct.html.twig', [
            
            'form' => $form,
        ]);
    }
    
    #[Route('/product/{id}/editProduct', name: 'app_product_editProduct')]
    public function productEdit(Request $request, Product $product):Response
    {
        $productEdit = $this->matmanserv->editProduct($product);
        $form = $this->createForm(ProductType::class, $productEdit);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            
            $this->matmanserv->newProduct($product);
            
            return $this->redirectToRoute('app_product_productList');
        }
        
        //$options =  'edit_customer';
        
        return $this->renderForm('product/editProduct.html.twig', [
            //'data' => $data,
            'form' => $form,
            'product' => $productEdit,
            //'options' => $options,
        ]);
    }
    
    #[Route('/product/{id}/delProduct', name: 'app_product_delProduct')]
    public function productDel(Request $request, Product $product):Response
    {
        
        $products = $this->matmanserv->delProduct($product);
        
        //$options =  'edit_customer';
        
        return $this->renderForm('product/index.html.twig', [
            
            'products' => $products,
            //'options' => $options,
        ]);
    }
}
