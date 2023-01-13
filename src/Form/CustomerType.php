<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('salutation', ChoiceType::class, [
            'choices' => [
                'Frau' => 'Frau',
                'Mann' => 'Mann',
                ],
                'label' => false])
            ->add('name', TextType::class, [
                'label' => false,
            ])
            ->add('prename', TextType::class, [
                'label' => false,
            ])
            ->add('mail', TextType::class, [
                'label' => false,
            ])
            ->add('street', TextType::class, [
                'label' => false,
            ])
            ->add('number', IntegerType::class, [
                'label' => false,
            ])
            ->add('postalcode', IntegerType::class, [
                'label' => false,
            ])
            ->add('customerNumber', IntegerType::class, [
                'label' => false,
            ])
            ->add('country', TextType::class, [
                'label' => false,
            ])
            ->add('city', TextType::class, [
                'label' => false,
            ])
            ->add('streetInvoice', TextType::class, [
                'label' => false,
            ])
            ->add('numberInvoice', IntegerType::class, [
                'label' => false,
            ])
            ->add('postlalcodeInvoice', IntegerType::class, [
                'label' => false,
            ])
            ->add('countryInvoice', TextType::class, [
                'label' => false,
            ])
            ->add('cityInvoice', TextType::class, [
                'label' => false,
            ])
            ->add('save', SubmitType::class, [
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
