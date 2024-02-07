<?php

namespace App\Entity;

use App\Repository\ExamVisualAcuityRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamVisualAcuityRepository::class)]
class ExamVisualAcuity
{
    use CommonMedicalExamEntityTrait;

    public const RESULT_DISTANT = 0;
    public const RESULT_NEAR    = 1;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $colorVision = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visualAcuityUnaidedRightEye = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visualAcuityUnaidedLeftEye = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visualAcuityUnaidedBinocular = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visualAcuityAidedRightEye = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visualAcuityAidedLeftEye = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visualAcuityAidedBinocular = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visualFieldsRightEye = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visualFieldsLeftEye = null;

    public function getColorVision(): ?string
    {
        return $this->colorVision;
    }

    public function setColorVision(?string $colorVision): static
    {
        $this->colorVision = $colorVision;

        return $this;
    }

    public function getVisualAcuityUnaidedRightEye(): ?string
    {
        return $this->visualAcuityUnaidedRightEye;
    }

    public function setVisualAcuityUnaidedRightEye(?string $visualAcuityUnaidedRightEye): static
    {
        $this->visualAcuityUnaidedRightEye = $visualAcuityUnaidedRightEye;

        return $this;
    }

    public function getVisualAcuityUnaidedLeftEye(): ?string
    {
        return $this->visualAcuityUnaidedLeftEye;
    }

    public function setVisualAcuityUnaidedLeftEye(?string $visualAcuityUnaidedLeftEye): static
    {
        $this->visualAcuityUnaidedLeftEye = $visualAcuityUnaidedLeftEye;

        return $this;
    }

    public function getVisualAcuityUnaidedBinocular(): ?string
    {
        return $this->visualAcuityUnaidedBinocular;
    }

    public function setVisualAcuityUnaidedBinocular(?string $visualAcuityUnaidedBinocular): static
    {
        $this->visualAcuityUnaidedBinocular = $visualAcuityUnaidedBinocular;

        return $this;
    }

    public function getVisualAcuityAidedRightEye(): ?string
    {
        return $this->visualAcuityAidedRightEye;
    }

    public function setVisualAcuityAidedRightEye(?string $visualAcuityAidedRightEye): static
    {
        $this->visualAcuityAidedRightEye = $visualAcuityAidedRightEye;

        return $this;
    }

    public function getVisualAcuityAidedLeftEye(): ?string
    {
        return $this->visualAcuityAidedLeftEye;
    }

    public function setVisualAcuityAidedLeftEye(?string $visualAcuityAidedLeftEye): static
    {
        $this->visualAcuityAidedLeftEye = $visualAcuityAidedLeftEye;

        return $this;
    }

    public function getVisualAcuityAidedBinocular(): ?string
    {
        return $this->visualAcuityAidedBinocular;
    }

    public function setVisualAcuityAidedBinocular(?string $visualAcuityAidedBinocular): static
    {
        $this->visualAcuityAidedBinocular = $visualAcuityAidedBinocular;

        return $this;
    }

    public function getVisualFieldsRightEye(): ?string
    {
        return $this->visualFieldsRightEye;
    }

    public function setVisualFieldsRightEye(?string $visualFieldsRightEye): static
    {
        $this->visualFieldsRightEye = $visualFieldsRightEye;

        return $this;
    }

    public function getVisualFieldsLeftEye(): ?string
    {
        return $this->visualFieldsLeftEye;
    }

    public function setVisualFieldsLeftEye(?string $visualFieldsLeftEye): static
    {
        $this->visualFieldsLeftEye = $visualFieldsLeftEye;

        return $this;
    }
}
