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
            ->add('name', TextType::class)
            ->add('prename', TextType::class)
            ->add('mail', TextType::class)
            ->add('street', TextType::class)
            ->add('number', IntegerType::class)
            ->add('postalcode', IntegerType::class)
            ->add('customerNumber', IntegerType::class)
            ->add('country', TextType::class)
            ->add('city', TextType::class)
            ->add('streetInvoice', TextType::class)
            ->add('numberInvoice', TextType::class)
            ->add('postlalcodeInvoice', TextType::class)
            ->add('countryInvoice', TextType::class)
            ->add('cityInvoice', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
