<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BloodTypeType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'O positive' => 'O+',
                'O negative' => 'O-',
                'A positive' => 'A+',
                'A negative' => 'A-',
                'B positive' => 'B+',
                'B negative' => 'B-',
                'AB positive' => 'AB+',
                'AB negative' => 'AB-',
            ],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}