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
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $builder
            ->add('temperature', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('spo2', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('respiration', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('bp', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('height', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('weight', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('bmi', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamPhysical::class,
        ]);
    }
}
