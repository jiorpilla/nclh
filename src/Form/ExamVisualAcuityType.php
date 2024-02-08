<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamVisualAcuity;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamVisualAcuityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $builder
            ->add('colorVision', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('visualAcuityUnaidedRightEye', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('visualAcuityUnaidedLeftEye', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('visualAcuityUnaidedBinocular', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('visualAcuityAidedRightEye', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('visualAcuityAidedLeftEye', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('visualAcuityAidedBinocular', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('visualFieldsRightEye', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('visualFieldsLeftEye', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamVisualAcuity::class,
        ]);
    }
}
