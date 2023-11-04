<?php

namespace App\Entity;

use App\Repository\MedicalHistoryRepository;
use App\Utils\Traits\CommonEntityTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicalHistoryRepository::class)]
class MedicalHistory
{
    use CommonEntityTrait;

    #[ORM\ManyToOne(inversedBy: 'medicalHistories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Crew $Crew = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public function getCrew(): ?Crew
    {
        return $this->Crew;
    }

    public function setCrew(?Crew $Crew): static
    {
        $this->Crew = $Crew;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
