<?php

namespace App\Form;

use App\Entity\Appointee;
use App\Form\Type\GenderType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppointeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('company')
            ->add('first_name')
            ->add('last_name')
            ->add('middle_name')
            ->add('suffix')
            ->add('gender',GenderType::class)
            ->add('date_of_birth', BirthdayType::class, [
                'widget' => 'single_text',
            ])
            ->add('location_of_birth')
            ->add('phone_number')
            ->add('email', EmailType::class)
            ->add('civil_status')
            ->add('address')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Appointee::class,
            'label' => false,
        ]);
    }
}
