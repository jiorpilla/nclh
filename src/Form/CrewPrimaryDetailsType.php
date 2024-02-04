<?php

namespace App\Form;

use App\Entity\Crew;
use App\Form\Type\CivilStatusType;
use App\Form\Type\GenderType;
use App\Form\Type\ImageUploadType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CrewPrimaryDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $attr = ['disabled' => 'disabled'];
        $builder
            ->add('firstName', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('lastName', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('middleName', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('suffix', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('nationality', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('ship', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('position', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('passportNumber', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('seamanBookNumber', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('company', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('ship', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('locationOfBirth', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('gender',GenderType::class, options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('dateOfBirth', BirthdayType::class, [
                'widget' => 'single_text',
                'row_attr' => $row_attr,
                'attr' => $attr
            ])
            ->add('civilStatus', CivilStatusType::class, options: ['row_attr' => $row_attr, 'attr' => $attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Crew::class
        ]);
    }
}
