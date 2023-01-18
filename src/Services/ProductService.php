<?php
namespace App\Services;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;

class ProductService
{
    
    private $doctrine;
    
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    
    public function getProducts() 
    {
        
        $entityManager = $this->doctrine->getManager();
        
        $products =  $this->doctrine->getRepository(Product::class)->findAll();
        
        return $products;
    }
    
    public function newProduct($product)
    {
        $entityManager = $this->doctrine->getManager();
        
        $entityManager->persist($product);
        
        $entityManager->flush();
    }
    
    public function editProduct($product) 
    {
        $productEdit = $this->doctrine->getRepository(Product::class)->find($product);
        $em = $this->doctrine->getManager();
        
        return $productEdit;
    }
    
    public function delProduct($product)
    {
        $this->doctrine->getRepository(Product::class)->remove($product);
        $em = $this->doctrine->getManager();
        $em->flush();
        
        $products =  $this->doctrine->getRepository(Product::class)->findAll();
        
        return $products;
        
    }
}

