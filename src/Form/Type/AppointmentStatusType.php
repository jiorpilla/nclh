<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppointmentStatusType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'Pending' => 'pending',
                'Confirmed' => 'confirmed',
                'Checked In' => 'checked_in',
            ],
            'expanded' => true,
            'multiple' => true,
            'data' => ['pending','confirmed'],
            'label_attr' => ['class' => 'radio-inline'],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
