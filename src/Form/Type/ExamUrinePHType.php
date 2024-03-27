<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamUrinePHType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                '5' => '5',
                '6' => '6',
                '6.5' => '6.5',
                '7' => '7',
                '7.5' => '7.5',
                '8' => '8',
                '8.5' => '8.5',
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
