<?php

namespace App\Entity;

use App\Repository\ExamUrinalysisRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamUrinalysisRepository::class)]
class ExamUrinalysis
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $appearance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ph = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nitrites = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $glucose = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ketones = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $protein = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $urobilin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $leucocytes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $erythrocytes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $epithelialCells = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $crystals = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bacteria = null;

    public const RESULT_ABNORMAL = 0;
    public const RESULT_NORMAL   = 1;

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getAppearance(): ?string
    {
        return $this->appearance;
    }

    public function setAppearance(?string $appearance): static
    {
        $this->appearance = $appearance;

        return $this;
    }

    public function getPh(): ?string
    {
        return $this->ph;
    }

    public function setPh(?string $ph): static
    {
        $this->ph = $ph;

        return $this;
    }

    public function getNitrites(): ?string
    {
        return $this->nitrites;
    }

    public function setNitrites(?string $nitrites): static
    {
        $this->nitrites = $nitrites;

        return $this;
    }

    public function getGlucose(): ?string
    {
        return $this->glucose;
    }

    public function setGlucose(?string $glucose): static
    {
        $this->glucose = $glucose;

        return $this;
    }

    public function getKetones(): ?string
    {
        return $this->ketones;
    }

    public function setKetones(?string $ketones): static
    {
        $this->ketones = $ketones;

        return $this;
    }

    public function getProtein(): ?string
    {
        return $this->protein;
    }

    public function setProtein(?string $protein): static
    {
        $this->protein = $protein;

        return $this;
    }

    public function getUrobilin(): ?string
    {
        return $this->urobilin;
    }

    public function setUrobilin(?string $urobilin): static
    {
        $this->urobilin = $urobilin;

        return $this;
    }

    public function getLeucocytes(): ?string
    {
        return $this->leucocytes;
    }

    public function setLeucocytes(?string $leucocytes): static
    {
        $this->leucocytes = $leucocytes;

        return $this;
    }

    public function getErythrocytes(): ?string
    {
        return $this->erythrocytes;
    }

    public function setErythrocytes(?string $erythrocytes): static
    {
        $this->erythrocytes = $erythrocytes;

        return $this;
    }

    public function getEpithelialCells(): ?string
    {
        return $this->epithelialCells;
    }

    public function setEpithelialCells(?string $epithelialCells): static
    {
        $this->epithelialCells = $epithelialCells;

        return $this;
    }

    public function getCrystals(): ?string
    {
        return $this->crystals;
    }

    public function setCrystals(?string $crystals): static
    {
        $this->crystals = $crystals;

        return $this;
    }

    public function getBacteria(): ?string
    {
        return $this->bacteria;
    }

    public function setBacteria(?string $bacteria): static
    {
        $this->bacteria = $bacteria;

        return $this;
    }
}
