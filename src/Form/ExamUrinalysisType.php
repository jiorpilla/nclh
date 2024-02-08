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
        $builder
            ->add('color', ExamFieldStatusType::class)
            ->add('appearance', ExamFieldStatusType::class)
            ->add('ph', ExamFieldStatusType::class)
            ->add('nitrites', ExamFieldStatusType::class)
            ->add('glucose', ExamFieldStatusType::class)
            ->add('ketones', ExamFieldStatusType::class)
            ->add('protein', ExamFieldStatusType::class)
            ->add('urobilin', ExamFieldStatusType::class)
            ->add('leucocytes', ExamFieldStatusType::class)
            ->add('erythrocytes', ExamFieldStatusType::class)
            ->add('epithelialCells', ExamFieldStatusType::class)
            ->add('crystals', ExamFieldStatusType::class)
            ->add('bacteria', ExamFieldStatusType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamUrinalysis::class,
        ]);
    }
}
