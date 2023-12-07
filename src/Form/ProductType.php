<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('productName', TextType::class, [
                'label_attr' => ['class' => 'MYCLASSFOR_LABEL'],
                'attr' => ['class' => 'product_name']
                    
                ])

            ->add('productType', ChoiceType::class, [
                'choices' => [
                    'Dienstleistung' => 'Dienstleistung',
                    'Produkt' => 'Produkt',
                ],
            ])
            ->add('description', TextType::class, [
                'label_attr' => ['class' => 'MYCLASSFOR_LABEL'],
                'attr' => ['class' => 'product_name']
                
            ])
            ->add('taxRate', IntegerType::class, [
                'label_attr' => ['class' => 'MYCLASSFOR_LABEL'],
                'attr' => ['class' => 'product_name']
                
            ])
            ->add('serialNumber', IntegerType::class, [
                'label_attr' => ['class' => 'MYCLASSFOR_LABEL'],
                'attr' => ['class' => 'product_name']
                
            ])
            ->add('intNumber', IntegerType::class, [
                'label_attr' => ['class' => 'MYCLASSFOR_LABEL'],
                'attr' => ['class' => 'product_name']
                
            ])
            ->add('storagePlace', TextType::class, [
                'label_attr' => ['class' => 'MYCLASSFOR_LABEL'],
                'attr' => ['class' => 'product_name']
                
            ])
            ->add('quantity', IntegerType::class, [
                'label_attr' => ['class' => 'MYCLASSFOR_LABEL'],
                'attr' => ['class' => 'product_name']
                
            ])
            ->add('price', IntegerType::class, [
                'label_attr' => ['class' => 'MYCLASSFOR_LABEL'],
                'attr' => ['class' => 'product_name']
                
            ])
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
