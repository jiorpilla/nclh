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
        $builder
            ->add('leukocytes', ExamFieldStatusType::class)
            ->add('erythrocytes', ExamFieldStatusType::class)
            ->add('hemoglobin', ExamFieldStatusType::class)
            ->add('hematocrit', ExamFieldStatusType::class)
            ->add('meanCorpuscularVolume', ExamFieldStatusType::class)
            ->add('meanCorpuscularHemoglobin', ExamFieldStatusType::class)
            ->add('neutrophils', ExamFieldStatusType::class)
            ->add('lymphocytes', ExamFieldStatusType::class)
            ->add('monocytes', ExamFieldStatusType::class)
            ->add('eosinophils', ExamFieldStatusType::class)
            ->add('basophils', ExamFieldStatusType::class)
            ->add('plateletCount', ExamFieldStatusType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamCBC::class,
        ]);
    }
}
