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
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $builder
            ->add('bonyCage', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('heart', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('lungs', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('diaphragms', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamChestXray::class,
        ]);
    }
}
