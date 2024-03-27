<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamUrinalysis;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use App\Form\Type\ExamUrineAppearanceType;
use App\Form\Type\ExamUrineBacteriaType;
use App\Form\Type\ExamUrineColorType;
use App\Form\Type\ExamUrineCrystalType;
use App\Form\Type\ExamUrineErythrocytesType;
use App\Form\Type\ExamUrineKetonesType;
use App\Form\Type\ExamUrineLeukocytesType;
use App\Form\Type\ExamUrineNitritesType;
use App\Form\Type\ExamUrinePHType;
use App\Form\Type\ExamUrineProteinType;
use App\Form\Type\ExamUrineUrobilinType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamUrinalysisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('color', ExamUrineColorType::class)
            ->add('appearance', ExamUrineAppearanceType::class)
            ->add('ph', ExamUrinePHType::class)
            ->add('nitrites', ExamUrineNitritesType::class)
            ->add('glucose', ExamUrineNitritesType::class)
            ->add('ketones', ExamUrineKetonesType::class)
            ->add('protein', ExamUrineProteinType::class)
            ->add('urobilin', ExamUrineUrobilinType::class)
            ->add('leucocytes', ExamUrineLeukocytesType::class)
            ->add('erythrocytes', ExamUrineErythrocytesType::class)
            ->add('epithelialCells', TextType::class)
            ->add('crystals', ExamUrineCrystalType::class)
            ->add('bacteria', ExamUrineBacteriaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamUrinalysis::class,
        ]);
    }
}
