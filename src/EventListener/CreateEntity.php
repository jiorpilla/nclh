<?php

namespace App\EventListener;

use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;
use Symfony\Bundle\SecurityBundle\Security;

#[AsDoctrineListener(event: Events::prePersist, priority: 500, connection: 'default')]
class CreateEntity
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    // the listener methods receive an argument which gives you access to
    // both the entity object of the event and the entity manager itself
    public function prePersist(PrePersistEventArgs $args): void
    {
        $user = $this->security->getUser();

        $deleted = 0;
        $datetime = new \DateTime();
        $user_id = $user->getId();

        $entity = $args->getObject();
        $entity->setDeleted($deleted);
        $entity->setCreatedBy($user_id);
        $entity->setCreatedAt($datetime);
        $entity->setUpdatedBy($user_id);
        $entity->setUpdatedAt($datetime);

        // if this listener only applies to certain entity types,
        // add some code to check the entity type as early as possible
        // if (!$entity instanceof Product) {
        //     return;
        // }

//        $entityManager = $args->getObjectManager();
        // ... do something with the Product entity
    }

}