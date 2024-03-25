<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\ExamAudiometry;
use App\Entity\Findings;
use App\Entity\MedicalHistory;
use App\Form\Type\ExamFieldStatusType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamAudiometryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $row_attr = ['class' => 'mb-3 col-md-6'];
        $builder
            ->add('right500', TextType::class)
            ->add('right1000', TextType::class)
            ->add('right2000', TextType::class)
            ->add('right3000', TextType::class)
            ->add('right4000', TextType::class)
            ->add('right6000', TextType::class)
            ->add('left500', TextType::class)
            ->add('left1000', TextType::class)
            ->add('left2000', TextType::class)
            ->add('left3000', TextType::class)
            ->add('left4000', TextType::class)
            ->add('left6000', TextType::class)
            ->add('rightWhisper', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
            ->add('leftWhisper', ExamFieldStatusType::class, options: ['row_attr' => $row_attr])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExamAudiometry::class,
        ]);
    }
}
