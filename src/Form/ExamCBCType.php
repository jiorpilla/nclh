<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamCBC;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamCBCType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('leukocytes', TextType::class)
            ->add('erythrocytes', TextType::class)
            ->add('hemoglobin', TextType::class)
            ->add('hematocrit', TextType::class)
            ->add('meanCorpuscularVolume', TextType::class)
            ->add('meanCorpuscularHemoglobin', TextType::class)
            ->add('neutrophils', TextType::class)
            ->add('lymphocytes', TextType::class)
            ->add('monocytes', TextType::class)
            ->add('eosinophils', TextType::class)
            ->add('basophils', TextType::class)
            ->add('plateletCount', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamCBC::class,
        ]);
    }
}
