<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CivilStatusType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'Single' => '1',
                'Married' => '2',
                'Divorced' => '3',
                'Widowed' => '4',
                // Add other civil status options as needed
            ],
            'expanded' => false,
            'multiple' => false,
            'data' => '1',
            'label_attr' => ['class' => 'radio-inline'],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
