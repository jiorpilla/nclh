<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamDrugs;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldPositiveType;
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
            ->add('cocaine', ExamFieldPositiveType::class, options: ['row_attr' => $row_attr])
            ->add('marijuana', ExamFieldPositiveType::class, options: ['row_attr' => $row_attr])
            ->add('opiates', ExamFieldPositiveType::class, options: ['row_attr' => $row_attr])
            ->add('amphetamine', ExamFieldPositiveType::class, options: ['row_attr' => $row_attr])
            ->add('phencyclidine', ExamFieldPositiveType::class, options: ['row_attr' => $row_attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamDrugs::class,
        ]);
    }
}
