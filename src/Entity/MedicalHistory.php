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

    #[ORM\ManyToOne(inversedBy: 'medicalHistory')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Crew $Crew = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public const STATUS_NOT_STARTED = '1';
    public const STATUS_IN_PROGRESS = '2';
    public const STATUS_AWAITING_RESULTS = '3';
    public const STATUS_EVALUATION = '4';
    public const STATUS_CLOSED_PASS = '5';
    public const STATUS_CLOSED_FAIL = '6';

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
