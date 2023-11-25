<?php

namespace App\EventListener;


use App\Entity\Crew;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: Crew::class)]
class CrewIdNumber
{

    private EntityManagerInterface $entityManager;

    public function prePersist(Crew $crew, PrePersistEventArgs $args): void
    {
        $this->entityManager = $args->getObjectManager();

        // Get the last assigned number from the database
        $lastAssignedNumber = $this->getLastAssignedNumber();

        // Increment the last assigned number for the next crew member
        $nextNumber = $lastAssignedNumber + 1;

        // Use str_pad to add leading zeros and ensure a consistent length
        $id_number = str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

        $crew->setIdNumber($id_number);
    }


    private function getLastAssignedNumber()
    {
        $lastAssignedCrew = $this->entityManager->getRepository(Crew::class)->findOneBy([], ['id_number' => 'DESC']);

        if ($lastAssignedCrew) {
            $lastAssignedIdNumber = $lastAssignedCrew->getIdNumber();
            $lastAssignedNumber = (int) $lastAssignedIdNumber;
        } else {
            // If no crew members exist yet, start from 1
            $lastAssignedNumber = 0;
        }
        return $lastAssignedNumber;
    }
}