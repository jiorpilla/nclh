<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use App\Utils\Traits\CommonEntityTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    use CommonEntityTrait;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $AppointmentDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $status = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?Crew $crew = null;

    public function getAppointmentDate(): ?\DateTimeInterface
    {
        return $this->AppointmentDate;
    }

    public function setAppointmentDate(?\DateTimeInterface $AppointmentDate): static
    {
        $this->AppointmentDate = $AppointmentDate;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCrew(): ?Crew
    {
        return $this->crew;
    }

    public function setCrew(?Crew $crew): static
    {
        $this->crew = $crew;

        return $this;
    }
}
