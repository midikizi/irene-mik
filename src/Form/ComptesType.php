<?php

namespace App\Form;

use App\Entity\Clients;
use App\Entity\Comptes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ComptesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $options = [
            'individuel' => 'individuel',
            'moral' => 'moral',


        ];

        $builder
            ->add('numero_compte')
            ->add('solde')
            ->add('type', ChoiceType::class, [
                'label' => 'type :',
                'choices' => $options,
            ])
            ->add('date_ouvert')
            ->add('client', EntityType::class, [
                // looks for choices from this entity
                'class' => Clients::class,

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
            'data_class' => Comptes::class,
        ]);
    }
}
