<?php
namespace App\Services;

use App\Entity\Offer;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Offer\OfferData;
use App\Entity\OrderList;
use App\Entity\Product;
use App\Domain\Offer\ListItems;
use App\Entity\Customer;

class OfferService
{
    private $doctrine;
    
    private $offerData;
    
    public function __construct(ManagerRegistry $doctrine, OfferData $offerData)
    {
        $this->doctrine = $doctrine;
        $this->offerData = $offerData;
    }
    
    public function getOffers()
    {
        
        $entityManager = $this->doctrine->getManager();
        
        $offers =  $this->doctrine->getRepository(Offer::class)->findAll();
        
        return $offers;
    }
    
    public function newOffer($offer)
    {
        $entityManager = $this->doctrine->getManager();
        
        $entityManager->persist($offer);
        
        $entityManager->persist($offer->getCustomer());
        
        $entityManager->flush();
    }
    
    /**
     * 
     * @param Offer $offer
     * @return \App\Domain\Offer\OfferData
     */
    public function editOffer(Offer $offer)
    {
        $offerEdit = $this->doctrine->getRepository(Offer::class)->find($offer);
        $em = $this->doctrine->getManager();
        
        $this->offerEditData($offer);
        
        return $this->offerData;
    }
    
    /**
     * 
     * @param Offer $offer
     * @return \Doctrine\Persistence\array<int,
     */
    public function delOffer($offer)
    {
        $this->doctrine->getRepository(Offer::class)->remove($offer);
        $em = $this->doctrine->getManager();
        $em->flush();
        
        $offers =  $this->doctrine->getRepository(Offer::class)->findAll();
        
        return $offers;   
    }
    
    /**
     * 
     * @param OrderList $orderListNumber
     * @return Offer
     */
    public function getProductsFromOrderList($orderListNumber)
    {
        $offerEdit = $this->doctrine->getRepository(OrderList::class)->findByExampleField($orderListNumber);
        $em = $this->doctrine->getManager();
        
        return $offerEdit;
    }
   
    /**
     * 
     * @param Offer $offer
     */
    private function offerEditData($offer)
    {
        $em = $this->doctrine->getManager();
        
        $orderList = $offer->getOrderListNumber();
        
        $productsFromOrderList = $this->getProductsFromOrderList($orderList);
        
        $arrayLength = count($productsFromOrderList);
        
        for($i = 0; $i < $arrayLength; $i++) {
            
            $productItem = new Product();
            
            $productItemById = $this->doctrine->getRepository(Product::class)->find($productsFromOrderList[$i]->getProductId());
            
            $this->offerData->addListItem($productItemById);
            
        }
        
        $customerId = $offer->getCustomerId();
        
        $customer = $this->doctrine->getRepository(Customer::class)->find($customerId);
        
        $this->offerData->setCustomer($customer);
        $this->offerData->setCreationDate($offer->getCreationDate());
        $this->offerData->setExpiryDate($offer->getExpiryDate());
        $this->offerData->setTaxRate($offer->getTaxRate());
        $this->offerData->setPrice($offer->getPrice());
        
    }
    
    public function getCustomerData(){
        
        $em = $this->doctrine->getManager();
        
        $customer_data = $this->doctrine->getRepository(Customer::class)->findAll();
        
        return $customer_data;
    }
}


