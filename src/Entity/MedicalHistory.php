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

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\OneToOne(mappedBy: 'MedicalHistory', cascade: ['persist', 'remove'])]
    private ?ExamPhysical $examPhysical = null;

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

    public function getExamPhysical(): ?ExamPhysical
    {
        return $this->examPhysical;
    }

    public function setExamPhysical(ExamPhysical $examPhysical): static
    {
        // set the owning side of the relation if necessary
        if ($examPhysical->getMedicalHistory() !== $this) {
            $examPhysical->setMedicalHistory($this);
        }

        $this->examPhysical = $examPhysical;

        return $this;
    }
}
