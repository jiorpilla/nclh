<?php

namespace App\Form;

use App\Entity\Crew;
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
            ->add('email')
            ->add('civil_status')
            ->add('position')
            ->add('ship')
//            ->add('nationality')
//            ->add('passport_number')
//            ->add('seaman_book_number')
            ->add('company')
            ->add('Address', AddressType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Crew::class,
        ]);
    }
}
