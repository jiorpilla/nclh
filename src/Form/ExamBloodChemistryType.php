<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamBloodChemistry;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamBloodChemistryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $builder
            ->add('glucose', TextType::class, options: ['row_attr' => $row_attr])
            ->add('bun', TextType::class, options: ['row_attr' => $row_attr])
            ->add('creatinine', TextType::class, options: ['row_attr' => $row_attr])
            ->add('totalBilirubin', TextType::class, options: ['row_attr' => $row_attr])
            ->add('alt', TextType::class, options: ['row_attr' => $row_attr])
            ->add('ast', TextType::class, options: ['row_attr' => $row_attr])
            ->add('totalCholesterol', TextType::class, options: ['row_attr' => $row_attr])
            ->add('triglycerides', TextType::class, options: ['row_attr' => $row_attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamBloodChemistry::class,
        ]);
    }
}
