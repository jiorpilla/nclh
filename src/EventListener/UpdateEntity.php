<?php

namespace App\EventListener;

use App\Entity\Address;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;
use Symfony\Bundle\SecurityBundle\Security;

#[AsDoctrineListener(event: Events::preUpdate, priority: 500, connection: 'default')]
class UpdateEntity
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function preUpdate(PreUpdateEventArgs $args): void
    {
        $user = $this->security->getUser();

        $entity = $args->getObject();

        if(empty($user)){
            return;
        }
        if($entity instanceof Address){
            return;
        }

        $datetime = new \DateTime();
        $user_id = $user->getId();

        $entity->setUpdatedBy($user_id);
        $entity->setUpdatedAt($datetime);

    }
}