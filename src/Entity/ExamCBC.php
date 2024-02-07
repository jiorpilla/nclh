<?php

namespace App\Entity;

use App\Repository\ExamCBCRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamCBCRepository::class)]
class ExamCBC
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $leukocytes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $erythrocytes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hemoglobin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hematocrit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $meanCorpuscularVolume = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $meanCorpuscularHemoglobin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $neutrophils = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lymphocytes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $monocytes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $eosinophils = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $basophils = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $plateletCount = null;

    public const RESULT_ABNORMAL = 0;
    public const RESULT_NORMAL   = 1;

    public function getLeukocytes(): ?string
    {
        return $this->leukocytes;
    }

    public function setLeukocytes(?string $leukocytes): static
    {
        $this->leukocytes = $leukocytes;

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

    public function getHemoglobin(): ?string
    {
        return $this->hemoglobin;
    }

    public function setHemoglobin(?string $hemoglobin): static
    {
        $this->hemoglobin = $hemoglobin;

        return $this;
    }

    public function getHematocrit(): ?string
    {
        return $this->hematocrit;
    }

    public function setHematocrit(?string $hematocrit): static
    {
        $this->hematocrit = $hematocrit;

        return $this;
    }

    public function getMeanCorpuscularVolume(): ?string
    {
        return $this->meanCorpuscularVolume;
    }

    public function setMeanCorpuscularVolume(?string $meanCorpuscularVolume): static
    {
        $this->meanCorpuscularVolume = $meanCorpuscularVolume;

        return $this;
    }

    public function getMeanCorpuscularHemoglobin(): ?string
    {
        return $this->meanCorpuscularHemoglobin;
    }

    public function setMeanCorpuscularHemoglobin(?string $meanCorpuscularHemoglobin): static
    {
        $this->meanCorpuscularHemoglobin = $meanCorpuscularHemoglobin;

        return $this;
    }

    public function getNeutrophils(): ?string
    {
        return $this->neutrophils;
    }

    public function setNeutrophils(?string $neutrophils): static
    {
        $this->neutrophils = $neutrophils;

        return $this;
    }

    public function getLymphocytes(): ?string
    {
        return $this->lymphocytes;
    }

    public function setLymphocytes(?string $lymphocytes): static
    {
        $this->lymphocytes = $lymphocytes;

        return $this;
    }

    public function getMonocytes(): ?string
    {
        return $this->monocytes;
    }

    public function setMonocytes(?string $monocytes): static
    {
        $this->monocytes = $monocytes;

        return $this;
    }

    public function getEosinophils(): ?string
    {
        return $this->eosinophils;
    }

    public function setEosinophils(?string $eosinophils): static
    {
        $this->eosinophils = $eosinophils;

        return $this;
    }

    public function getBasophils(): ?string
    {
        return $this->basophils;
    }

    public function setBasophils(?string $basophils): static
    {
        $this->basophils = $basophils;

        return $this;
    }

    public function getPlateletCount(): ?string
    {
        return $this->plateletCount;
    }

    public function setPlateletCount(?string $plateletCount): static
    {
        $this->plateletCount = $plateletCount;

        return $this;
    }
}
