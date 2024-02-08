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
        $builder
            ->add('colorVision', ExamFieldStatusType::class)
            ->add('visualAcuityUnaidedRightEye', ExamFieldStatusType::class)
            ->add('visualAcuityUnaidedLeftEye', ExamFieldStatusType::class)
            ->add('visualAcuityUnaidedBinocular', ExamFieldStatusType::class)
            ->add('visualAcuityAidedRightEye', ExamFieldStatusType::class)
            ->add('visualAcuityAidedLeftEye', ExamFieldStatusType::class)
            ->add('visualAcuityAidedBinocular', ExamFieldStatusType::class)
            ->add('visualFieldsRightEye', ExamFieldStatusType::class)
            ->add('visualFieldsLeftEye', ExamFieldStatusType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamVisualAcuity::class,
        ]);
    }
}
