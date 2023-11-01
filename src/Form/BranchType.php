<?php

namespace App\Form;

use App\Entity\Branch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BranchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => false,
//                'delete_label' => 'delete',
//                'download_label' => 'download',
                'download_uri' => false,
//                'image_uri' => true,
//                'imagine_pattern' => '...',
//                'asset_helper' => true,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Branch::class,
        ]);
    }
}
