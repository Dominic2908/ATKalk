<?php

namespace App\Form;

use App\Entity\Invoice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('invoicenumber')
            ->add('invoiceCreationDate')
            ->add('debtorNumber')
            ->add('goodsList')
            ->add('dueDate')
            ->add('description')
            ->add('taxRate')
            ->add('totalCostsNet')
            ->add('totalCostsGross')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
