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

class CrewContactDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $attr = ['disabled' => 'disabled'];
        $builder
            ->add('email', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('phoneNumber', options: ['row_attr' => $row_attr, 'attr' => $attr])
            ->add('address', options: ['row_attr' => $row_attr, 'attr' => $attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Crew::class
        ]);
    }
}
