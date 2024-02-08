<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamBloodChemistry;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamBloodChemistryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $builder
            ->add('glucose', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('bun', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('creatinine', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('totalBilirubin', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('alt', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('ast', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('totalCholesterol', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('triglycerides', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamBloodChemistry::class,
        ]);
    }
}
