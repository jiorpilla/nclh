<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenderType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'Male' => 'male',
                'Female' => 'female',
            ],
            'expanded' => true,
            'multiple' => false,
            'data' => 'male',
            'label_attr' => ['class' => 'radio-inline']
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
