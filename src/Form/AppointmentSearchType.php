<?php

namespace App\Form;

use App\Form\Type\AppointmentStatusType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppointmentSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('search', TextType::class, [
                'row_attr' => ['class' => ''],
                'required' => false,
                'attr' => ['id' => 'search', 'placeholder' => 'Search...'],
            ])
            ->add('startDate', DateType::class, [
                'widget' => 'single_text',
                'row_attr' => ['class' => ''],
                'required' => false,
//                'html5' => false,
//                'attr' => ['class' => 'datepicker'], // You can add a class for styling or use a datepicker library
            ])
            ->add('endDate', DateType::class, [
                'widget' => 'single_text',
                'row_attr' => ['class' => ''],
                'required' => false,
//                'html5' => false,
//                'attr' => ['class' => 'datepicker'],
            ])
            ->add('appointmentStatus', AppointmentStatusType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'method' => 'GET', // Set the form method to GET
        ]);
    }
}
