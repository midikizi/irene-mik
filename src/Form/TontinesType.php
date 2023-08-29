<?php

namespace App\Form;

use App\Entity\Tontines;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TontinesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_debut')
            ->add('date_fin')
            ->add('montant')
            ->add('client')
            ->add('comptes')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tontines::class,
        ]);
    }
}
