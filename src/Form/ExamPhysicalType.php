<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamPhysical;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamPhysicalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('temperature', TextType::class)
            ->add('spo2', TextType::class)
            ->add('respiration', TextType::class)
            ->add('bp', TextType::class)
            ->add('height', TextType::class)
            ->add('weight', TextType::class)
            ->add('bmi', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamPhysical::class,
        ]);
    }
}
