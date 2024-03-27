<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamParasitesType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'With Presence of Ova and Parasites Seen' => 'withParasites',
                'No Intestinal Parasites Seen' => 'withoutParasites',
            ],
            'expanded' => true,
            'multiple' => false,
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
