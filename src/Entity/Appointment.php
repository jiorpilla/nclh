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

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?Crew $crew = null;

    #[ORM\Column(nullable: true)]
    private ?string $status = null;

    #[ORM\Column(nullable: true)]
    private ?int $package = null;

    public const STATUS_PENDING = 'pending';
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_CHECKED_IN = 'checked_in';

    public function getAppointmentDate(): ?\DateTimeInterface
    {
        return $this->AppointmentDate;
    }

    public function setAppointmentDate(?\DateTimeInterface $AppointmentDate): static
    {
        $this->AppointmentDate = $AppointmentDate;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPackage(): ?int
    {
        return $this->package;
    }

    public function setPackage(?int $package): static
    {
        $this->package = $package;

        return $this;
    }
}
