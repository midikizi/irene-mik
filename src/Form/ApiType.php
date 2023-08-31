<?php

namespace App\Form;

use App\Entity\Api;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ApiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $options = [
            'Tmoney' => 'Tmoney',
            'Flooz' => 'Flooz',


        ];

        $stat = [
            'demande' => 'demande',
            'accordé' => 'accordé',
            'échec' => 'échec',


        ];
        $builder
            ->add('montant')
            ->add('telephone')
            ->add('operateur', ChoiceType::class, [
                'label' => 'Opérateur :',
                'choices' => $options,
            ])
            ->add('code_secret')
            ->add('status', ChoiceType::class, [
                'label' => 'status :',
                'choices' => $stat,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Api::class,
        ]);
    }
}
