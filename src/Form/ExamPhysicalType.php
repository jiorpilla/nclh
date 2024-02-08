<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamPhysical;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamPhysicalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('temperature', ExamFieldStatusType::class)
            ->add('spo2', ExamFieldStatusType::class)
            ->add('respiration', ExamFieldStatusType::class)
            ->add('bp', ExamFieldStatusType::class)
            ->add('height', ExamFieldStatusType::class)
            ->add('weight', ExamFieldStatusType::class)
            ->add('bmi', ExamFieldStatusType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamPhysical::class,
        ]);
    }
}
