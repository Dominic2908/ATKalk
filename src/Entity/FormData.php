<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class FormData
{
    #[Assert\NotBlank]
    public $customer;
    
}

