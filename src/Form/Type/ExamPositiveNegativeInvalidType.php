<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamPositiveNegativeInvalidType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'Postive' => 'positive',
                'Negative' => 'negative',
                'Invalid' => 'invalid',
            ],
            'expanded' => false,
            'multiple' => false,
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
