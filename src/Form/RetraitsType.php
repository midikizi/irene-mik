<?php

namespace App\Form;

use App\Entity\Retraits;
use App\Entity\Comptes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RetraitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montant')
            ->add('date_retrait')
            ->add('client')
            ->add('comptes', EntityType::class, [
                // looks for choices from this entity
                'class' => Comptes::class,

                // uses the User.username property as the visible option string
                //'choice_label' => 'username',

                // used to render a select box, check boxes or radios
                //'multiple' => true,
                //'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Retraits::class,
        ]);
    }
}
