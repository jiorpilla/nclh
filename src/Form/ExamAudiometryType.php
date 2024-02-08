<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamAudiometry;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamAudiometryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fasting')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamAudiometry::class,
        ]);
    }
}
