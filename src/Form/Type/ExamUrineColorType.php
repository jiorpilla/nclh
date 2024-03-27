<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamUrineColorType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'Clear' => 'clear',
                'Light Yellow' => 'light-yellow',
                'Dark Yellow' => 'dark-yellow',
                'Amber' => 'amber',
                'Brown' => 'brown',
                'Red' => 'red',
            ],
            'expanded' => true,
            'multiple' => false,
            'label_attr' => ['class' => 'radio-inline']
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
