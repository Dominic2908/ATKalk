<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $invoicenumber = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $invoiceCreationDate = null;

    #[ORM\Column(length: 255)]
    private ?string $debtorNumber = null;

    #[ORM\Column(nullable: true)]
    private ?int $goodsList = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dueDate = null;
    
    #[ORM\Column(length: 255)]
    private ?string $description = null;   
    
    #[ORM\Column(nullable: true)]
    private ?int $taxRate = null;
    
    #[ORM\Column]
    private ?float $totalCostsNet = null;
    
    #[ORM\Column]
    private ?float $totalCostsGross = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoicenumber(): ?int
    {
        return $this->invoicenumber;
    }

    public function setInvoicenumber(int $invoicenumber): self
    {
        $this->invoicenumber = $invoicenumber;

        return $this;
    }

    public function getInvoiceCreationDate(): ?\DateTimeInterface
    {
        return $this->invoiceCreationDate;
    }

    public function setInvoiceCreationDate(\DateTimeInterface $invoiceCreationDate): self
    {
        $this->invoiceCreationDate = $invoiceCreationDate;

        return $this;
    }

    public function getDebtorNumber(): ?string
    {
        return $this->debtorNumber;
    }

    public function setDebtorNumber(string $debtorNumber): self
    {
        $this->debtorNumber = $debtorNumber;

        return $this;
    }

    public function getGoodsList(): ?int
    {
        return $this->goodsList;
    }

    public function setGoodsList(?int $goodsList): self
    {
        $this->goodsList = $goodsList;

        return $this;
    }

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    
    /**
     * @return mixed
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }
    
    /**
     * @return mixed
     */
    public function getTotalCostsNet()
    {
        return $this->totalCostsNet;
    }
    
    /**
     * @return mixed
     */
    public function getTotalCostsGross()
    {
        return $this->totalCostsGross;
    }
    
    /**
     * @param mixed $taxRate
     */
    public function setTaxRate($taxRate)
    {
        $this->taxRate = $taxRate;
    }
    
    /**
     * @param mixed $totalCostsNet
     */
    public function setTotalCostsNet($totalCostsNet)
    {
        $this->totalCostsNet = $totalCostsNet;
    }
    
    /**
     * @param mixed $totalCostsGross
     */
    public function setTotalCostsGross($totalCostsGross)
    {
        $this->totalCostsGross = $totalCostsGross;
    }
}
