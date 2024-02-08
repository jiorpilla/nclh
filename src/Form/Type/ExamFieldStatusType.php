<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamFieldStatusType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'Normal' => 'normal',
                'Abnormal' => 'abnormal',
            ],
            'expanded' => false,
            'multiple' => false,
            'data' => 'normal',
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
