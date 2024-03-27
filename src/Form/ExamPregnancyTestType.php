<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamPregnancyTest;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldPositiveType;
use App\Form\Type\ExamPositiveNegativeInvalidType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamPregnancyTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pregnancyTest', ExamPositiveNegativeInvalidType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamPregnancyTest::class,
        ]);
    }
}
