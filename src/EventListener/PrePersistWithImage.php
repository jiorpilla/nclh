<?php

namespace App\EventListener;

use App\Entity\Branch;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;
use Symfony\Bundle\SecurityBundle\Security;

#[AsDoctrineListener(event: Events::prePersist, priority: 500, connection: 'default')]
class PrePersistWithImage
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * Just to be clear this is created so that images that has a DIRnamer structure can be tracked
     * this will only change on Persist so technically on create only, BUT
     * will still not be okay once persist is run on an update and the image is not set.
     * @param PrePersistEventArgs $args
     */
    public function prePersist(PrePersistEventArgs $args): void
    {
        $user = $this->security->getUser();

        if(empty($user)){
            return;
        }

        $entity = $args->getObject();
        //currently Branch is the only 1 with Image upload.

        if (!$entity instanceof Branch) {
            return;
        }

        $datetime = new \DateTime();

        $entity->setUploadDatetime($datetime);
    }
}