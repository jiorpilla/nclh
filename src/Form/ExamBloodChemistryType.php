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
        $builder
            ->add('glucose', ExamFieldStatusType::class)
            ->add('bun', ExamFieldStatusType::class)
            ->add('creatinine', ExamFieldStatusType::class)
            ->add('totalBilirubin', ExamFieldStatusType::class)
            ->add('alt', ExamFieldStatusType::class)
            ->add('ast', ExamFieldStatusType::class)
            ->add('totalCholesterol', ExamFieldStatusType::class)
            ->add('triglycerides', ExamFieldStatusType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamBloodChemistry::class,
        ]);
    }
}
