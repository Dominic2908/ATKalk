<?php
namespace App\Domain\Offer;


use App\Entity\Product;

class ListItems
{
    /**
     * 
     * @var Product
     */
   private $listItems;
   
   /**
    * 
    * @var int
    */
   private $listNumber;

   /**
     * @return \App\Entity\Product
     */
    public function getListItems():?Product
    {
        return $this->listItems;
    }

    /**
     * @param \App\Entity\Product $listItems
     */
    public function setListItems($listItems):void
    {
        $this->listItems = $listItems;
    }

        
    /**
     * @return number
     */
    public function getListNumber():int
    {
        return $this->listNumber;
    }
    
    /**
     * @param number $listNumber
     */
    public function setListNumber($listNumber):void
    {
        $this->listNumber = $listNumber;
    }

}

