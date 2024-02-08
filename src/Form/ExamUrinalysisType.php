<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamUrinalysis;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamUrinalysisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $builder
            ->add('color', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('appearance', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('ph', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('nitrites', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('glucose', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('ketones', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('protein', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('urobilin', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('leucocytes', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('erythrocytes', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('epithelialCells', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('crystals', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('bacteria', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamUrinalysis::class,
        ]);
    }
}
