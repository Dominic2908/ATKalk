<?php

namespace App\Form;

use App\Entity\Customer;
use App\Entity\Offer;
use App\Entity\OrderList;
use App\Form\OrderListType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;



class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('customer_id')
            ->add('creation_date', DateType::class, [
                'label' => false,
            ])
            ->add('order_list_number', IntegerType::class, [
                'label' => false,
            ])
            ->add('expiry_date', DateType::class, [
                
            ])
            ->add('tax_rate')
            ->add('price')
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'tinymce',
                    'cols' => '25',
                    'rows' => '10'],
                
            ])
            ->add('short_description')
            ->add('Customer', CustomerType::class, [
                'label' => false,
            ])

            ->add('positions', CollectionType::class, [
                'entry_type' => ProductType::class,
                'label' => false,
                'entry_options' => [
                    'attr' => ['class' => 'product-box'],    
                ],
                'allow_add' => true ,
                'allow_delete' => true ,
                'prototype' => true,
                'by_reference' => false,
            ])
            ->add('save', SubmitType::class, [               
            ])
            
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
