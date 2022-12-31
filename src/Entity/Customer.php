<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $salutation = null;
    
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $prename = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $street = null;

    #[ORM\Column]
    private ?int $number = null;
    
    #[ORM\Column]
    private ?int $customerNumber = null;
    
    #[ORM\Column]
    private ?int $postalcode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;
    
    #[ORM\Column(length: 255)]
    private ?string $country = null;
    
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $streetInvoice = null;
    
    #[ORM\Column]
    private ?int $numberInvoice = null;
    
    #[ORM\Column]
    private ?int $postlalcodeInvoice = null;
    
    #[ORM\Column(length: 255)]
    private ?string $cityInvoice = null;
    
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $countryInvoice = null;
    
    /**
     * @return mixed
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * @param mixed $salutation
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }

    /**
     * @return mixed
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * @return mixed
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getPostlalcodeInvoice()
    {
        return $this->postlalcodeInvoice;
    }

    /**
     * @return mixed
     */
    public function getCityInvoice()
    {
        return $this->cityInvoice;
    }

    /**
     * @param mixed $customerNumber
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->customerNumber = $customerNumber;
    }

    /**
     * @param mixed $postalcode
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $postlalcodeInvoice
     */
    public function setPostlalcodeInvoice($postlalcodeInvoice)
    {
        $this->postlalcodeInvoice = $postlalcodeInvoice;
    }

    /**
     * @param mixed $cityInvoice
     */
    public function setCityInvoice($cityInvoice)
    {
        $this->cityInvoice = $cityInvoice;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrename(): ?string
    {
        return $this->prename;
    }

    public function setPrename(string $prename): self
    {
        $this->prename = $prename;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }
    
    /**
     * @return mixed
     */
    public function getStreetInvoice()
    {
        return $this->streetInvoice;
    }
    
    /**
     * @return mixed
     */
    public function getNumberInvoice()
    {
        return $this->numberInvoice;
    }
    
    /**
     * @return mixed
     */
    public function getCountryInvoice()
    {
        return $this->countryInvoice;
    }
    
    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
    
    /**
     * @param mixed $streetInvoice
     */
    public function setStreetInvoice($streetInvoice)
    {
        $this->streetInvoice = $streetInvoice;
    }
    
    /**
     * @param mixed $numberInvoice
     */
    public function setNumberInvoice($numberInvoice)
    {
        $this->numberInvoice = $numberInvoice;
    }
    
    /**
     * @param mixed $countryInvoice
     */
    public function setCountryInvoice($countryInvoice)
    {
        $this->countryInvoice = $countryInvoice;
    }
    
}
