<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('productName')

            ->add('productType', ChoiceType::class, [
                'choices' => [
                    'Dienstleistung' => 'Dienstleistung',
                    'Produkt' => 'Produkt',
                ],
            ])
            ->add('price')
            ->add('description')
            ->add('taxRate')
            ->add('serialNumber')
            ->add('intNumber')
            ->add('storagePlace')
            ->add('quantity')
            ->add('save', SubmitType::class, [
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
