<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\RoomQueue;
use App\Form\DataTransformer\CrewToIdTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QueueType extends AbstractType
{
    public function __construct(
        private CrewToIdTransformer $transformer,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Room', EntityType::class, [
                'class' => Room::class,
                'choice_label' => 'name',
                'placeholder' => 'Select a Room'
            ])
//            ->add('Crew', HiddenType::class)
            ->add('Crew', HiddenType::class, [
                'attr' => [
                    'invalid_message' => 'That is not a valid issue number',
                    'data-room-queue-qr-scanner-target' => 'result'
                ],
            ])
            ->add('full_name', TextType::class, [
                'label' => 'Full Name',
                'mapped' => false,
                'attr' => [
                    'data-room-queue-qr-scanner-target' => 'fullname',
                    'readonly' => true, // Make it readonly to make it non-editable
                ],
            ]);
        ;
        $builder->get('Crew')
            ->addModelTransformer($this->transformer);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RoomQueue::class,
        ]);
    }
}
