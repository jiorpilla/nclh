<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamDrugs;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamPositiveNegativeInvalidType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamDrugsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $builder
            ->add('cocaine', ExamPositiveNegativeInvalidType::class, options: ['row_attr' => $row_attr])
            ->add('marijuana', ExamPositiveNegativeInvalidType::class, options: ['row_attr' => $row_attr])
            ->add('opiates', ExamPositiveNegativeInvalidType::class, options: ['row_attr' => $row_attr])
            ->add('amphetamine', ExamPositiveNegativeInvalidType::class, options: ['row_attr' => $row_attr])
            ->add('phencyclidine', ExamPositiveNegativeInvalidType::class, options: ['row_attr' => $row_attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamDrugs::class,
        ]);
    }
}
