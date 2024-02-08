<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamChestXray;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamChestXrayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bonyCage', ExamFieldStatusType::class)
            ->add('heart', ExamFieldStatusType::class)
            ->add('lungs', ExamFieldStatusType::class)
            ->add('diaphragms', ExamFieldStatusType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamChestXray::class,
        ]);
    }
}
