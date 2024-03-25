<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamPhysical;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamPhysical2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('heentMouth', ExamFieldStatusType::class)
            ->add('heentTonsil', ExamFieldStatusType::class)
            ->add('heentPharynx', ExamFieldStatusType::class)
            ->add('heentEars', ExamFieldStatusType::class)
            ->add('heentEyes', ExamFieldStatusType::class)
            ->add('neckNodes', ExamFieldStatusType::class)
            ->add('neckMotion', ExamFieldStatusType::class)
            ->add('neckThyroid', ExamFieldStatusType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamPhysical::class,
        ]);
    }
}
