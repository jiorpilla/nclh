<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamCBC;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamCBCType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $builder
            ->add('leukocytes', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('erythrocytes', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('hemoglobin', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('hematocrit', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('meanCorpuscularVolume', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('meanCorpuscularHemoglobin', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('neutrophils', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('lymphocytes', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('monocytes', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('eosinophils', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('basophils', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('plateletCount', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamCBC::class,
        ]);
    }
}
