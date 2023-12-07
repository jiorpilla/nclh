<?php

namespace App\Utils\Traits;

use App\Entity\MedicalHistory;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Ulid;

trait CommonMedicalExamEntityTrait
{
    use CommonEntityTrait;

    #[ORM\Column(nullable: true, options: ["default" => 0])]
    private ?int $fasting = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(type: 'ulid', nullable: true)]
    private ?Ulid $evaluator = null;

    #[ORM\OneToOne(inversedBy: 'examPhysical', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?MedicalHistory $MedicalHistory = null;

    public function getFasting(): ?int
    {
        return $this->fasting;
    }

    public function setFasting(int $fasting = 0): static
    {
        $this->fasting = $fasting;

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

    public function getEvaluator(): ?Ulid
    {
        return $this->evaluator;
    }

    public function setEvaluator(?Ulid $evaluator): static
    {
        $this->evaluator = $evaluator;

        return $this;
    }

    public function getMedicalHistory(): ?MedicalHistory
    {
        return $this->MedicalHistory;
    }

    public function setMedicalHistory(MedicalHistory $MedicalHistory): static
    {
        $this->MedicalHistory = $MedicalHistory;

        return $this;
    }
}