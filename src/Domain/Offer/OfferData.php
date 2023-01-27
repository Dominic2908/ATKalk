<?php
namespace App\Domain\Offer;

use App\Entity\Customer;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Entity\Product;


class OfferData
{
    
    /**
     * 
     * @var Customer
     */
    private $customer;
    
    /**
     * 
     * @var \DateTime
     */
    private $creationDate;
    
    /**
     * 
     * @var array
     */
    private $orderListItems;
    
    /**
     * 
     * @var \DateTime
     */
    private $expiryDate;
    
    /**
     * 
     * @var int
     */
    private $taxRate;
    
    /**
     * 
     * @var double
     */
    private $price;
    
    public function __construct()
    {
        $this->orderListItems = array();
    }
    
    /**
     * @return \App\Entity\Customer
     */
    public function getCustomer():?Customer
    {
        return $this->customer;
    }
    
    /**
     * @param \App\Entity\Customer $customer
     */
    public function setCustomer($customer): void
    {
        $this->customer = $customer;
    }
    

    /**
     * @return DateTime
     */
    public function getCreationDate(): ?\DateTime
    {
        return $this->creationDate;
    }

    /**
     * @return DateTime
     */
    public function getExpiryDate(): ?\DateTime
    {
        return $this->expiryDate;
    }

    /**
     * @return number
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * @return number
     */
    public function getPrice()
    {
        return $this->price;
    }

    
    /**
     * @param DateTime $creationDate
     */
    public function setCreationDate($creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @param array $orderListItems
     */
    public function setOrderListItems(array $orderListItems): void
    {
        $this->orderListItems = $orderListItems;
    }
    
    
    public function addListItem(Product $listItems){
        //$listItems->setListItems($this);
        $this->orderListItems[] = $listItems;
    }
    
    /**
     * @return array
     */
    public function getOrderListItems(): ?array
    {
        return $this->orderListItems;
    }

    /**
     * @param DateTime $expiryDate
     */
    public function setExpiryDate($expiryDate): void
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * @param number $taxRate
     */
    public function setTaxRate($taxRate): void
    {
        $this->taxRate = $taxRate;
    }

    /**
     * @param number $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }
    
    
}

