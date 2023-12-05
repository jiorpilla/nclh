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

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Appointee $Appointee = null;

    public function getAppointmentDate(): ?\DateTimeInterface
    {
        return $this->AppointmentDate;
    }

    public function setAppointmentDate(?\DateTimeInterface $AppointmentDate): static
    {
        $this->AppointmentDate = $AppointmentDate;

        return $this;
    }

    public function getAppointee(): ?Appointee
    {
        return $this->Appointee;
    }

    public function setAppointee(?Appointee $Appointee): static
    {
        $this->Appointee = $Appointee;

        return $this;
    }
}
