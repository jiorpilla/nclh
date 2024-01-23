<?php

namespace App\Form;

use App\Entity\Crew;
use App\Form\Type\CivilStatusType;
use App\Form\Type\GenderType;
use App\Form\Type\ImageUploadType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CrewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', ImageUploadType::class)
            ->add('firstName')
            ->add('lastName')
            ->add('middleName')
            ->add('suffix')
            ->add('gender',GenderType::class)
            ->add('dateOfBirth', BirthdayType::class, [
                'widget' => 'single_text',
            ])
            ->add('locationOfBirth')
            ->add('phoneNumber')
            ->add('email')
            ->add('civilStatus', CivilStatusType::class)
            ->add('position')
            ->add('ship')
            ->add('nationality')
            ->add('passportNumber')
            ->add('seamanBookNumber')
            ->add('company')
            ->add('address')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Crew::class,
        ]);
    }
}
