<?php

namespace App\Entity;

use App\Repository\ExamBloodChemistryRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamBloodChemistryRepository::class)]
class ExamBloodChemistry
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $glucose = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bun = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $creatinine = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $totalBilirubin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ast = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $totalCholesterol = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $triglycerides = null;

    public function getGlucose(): ?string
    {
        return $this->glucose;
    }

    public function setGlucose(?string $glucose): static
    {
        $this->glucose = $glucose;

        return $this;
    }

    public function getBun(): ?string
    {
        return $this->bun;
    }

    public function setBun(?string $bun): static
    {
        $this->bun = $bun;

        return $this;
    }

    public function getCreatinine(): ?string
    {
        return $this->creatinine;
    }

    public function setCreatinine(?string $creatinine): static
    {
        $this->creatinine = $creatinine;

        return $this;
    }

    public function getTotalBilirubin(): ?string
    {
        return $this->totalBilirubin;
    }

    public function setTotalBilirubin(?string $totalBilirubin): static
    {
        $this->totalBilirubin = $totalBilirubin;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): static
    {
        $this->alt = $alt;

        return $this;
    }

    public function getAst(): ?string
    {
        return $this->ast;
    }

    public function setAst(?string $ast): static
    {
        $this->ast = $ast;

        return $this;
    }

    public function getTotalCholesterol(): ?string
    {
        return $this->totalCholesterol;
    }

    public function setTotalCholesterol(?string $totalCholesterol): static
    {
        $this->totalCholesterol = $totalCholesterol;

        return $this;
    }

    public function getTriglycerides(): ?string
    {
        return $this->triglycerides;
    }

    public function setTriglycerides(?string $triglycerides): static
    {
        $this->triglycerides = $triglycerides;

        return $this;
    }
}
