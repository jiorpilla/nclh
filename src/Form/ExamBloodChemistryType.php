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
        $builder
            ->add('glucose', TextType::class)
            ->add('bun', TextType::class)
            ->add('creatinine', TextType::class)
            ->add('totalBilirubin', TextType::class)
            ->add('alt', TextType::class)
            ->add('ast', TextType::class)
            ->add('totalCholesterol', TextType::class)
            ->add('triglycerides', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamBloodChemistry::class,
        ]);
    }
}
