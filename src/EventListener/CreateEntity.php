<?php

namespace App\EventListener;

use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;
use Symfony\Bundle\SecurityBundle\Security;

#[AsDoctrineListener(event: Events::prePersist, priority: 500, connection: 'default')]
class CreateEntity
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    // the listener methods receive an argument which gives you access to
    // both the entity object of the event and the entity manager itself
    /**
     * when running doctrine:fixtures:load just comment the code
     * @param PrePersistEventArgs $args
     */
    public function prePersist(PrePersistEventArgs $args): void
    {
        $user = $this->security->getUser();

        $entity = $args->getObject();

        if(empty($user)){
            return;
        }
//        if($entity instanceof Address){
//            return;
//        }

        $deleted = 0;
        $datetime = new \DateTime();
        $user_id = $user->getId();

        $entity->setDeleted($deleted);
        $entity->setCreatedBy($user_id);
        $entity->setCreatedAt($datetime);
        $entity->setUpdatedBy($user_id);
        $entity->setUpdatedAt($datetime);

    }
}