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

class ExamPhysicalRangeOfMotionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('romCervicalFF', ExamFieldStatusType::class)
            ->add('romCervicalE', ExamFieldStatusType::class)
            ->add('romCervicalLF', ExamFieldStatusType::class)
            ->add('romCervicalR', ExamFieldStatusType::class)
            ->add('romShoulderFE', ExamFieldStatusType::class)
            ->add('romShoulderBE', ExamFieldStatusType::class)
            ->add('romShoulderAb', ExamFieldStatusType::class)
            ->add('romShoulderAd', ExamFieldStatusType::class)
            ->add('romShoulderIR', ExamFieldStatusType::class)
            ->add('romShoulderER', ExamFieldStatusType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamPhysical::class,
        ]);
    }
}
