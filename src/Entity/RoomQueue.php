<?php

namespace App\Entity;

use App\Enum\RoomQueueStatus;
use App\Repository\RoomQueueRepository;
use App\Utils\Traits\CommonEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomQueueRepository::class)]
class RoomQueue
{
    use CommonEntityTrait;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Room $Room = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Crew $Crew = null;

    #[ORM\Column]
    private ?int $queue = null;

    #[ORM\Column(length: 255, nullable: true, enumType:RoomQueueStatus::class)]
    private ?string $status = null;

    public function __construct()
    {
        // Set the default status when the RoomQueue is created
        $this->status = RoomQueueStatus::ON_QUEUE;
    }

    public function getRoom(): ?Room
    {
        return $this->Room;
    }

    public function setRoom(?Room $Room): static
    {
        $this->Room = $Room;

        return $this;
    }

    public function getCrew(): ?Crew
    {
        return $this->Crew;
    }

    public function setCrew(?Crew $Crew): static
    {
        $this->Crew = $Crew;

        return $this;
    }

    public function getQueue(): ?int
    {
        return $this->queue;
    }

    public function setQueue(int $queue): static
    {
        $this->queue = $queue;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        // Validate that the provided status is a valid value
        if (!in_array($status, [RoomQueueStatus::ON_QUEUE, RoomQueueStatus::IN_PROCESS, RoomQueueStatus::PROCESSED])) {
            throw new \InvalidArgumentException('Invalid status value.');
        }

        $this->status = $status;
        return $this;
    }
}
