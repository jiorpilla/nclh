<?php

namespace App\Entity;

use App\Repository\ExamVaccinesRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamVaccinesRepository::class)]
class ExamVaccines
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $covid19 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $covid19Date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $covid19ReferenceNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $yellowFever = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $yellowFeverDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $yellowFeverReferenceNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tetanus = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $tetanusDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tetanusReferenceNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mmr = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $mmrDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mmrReferenceNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $polio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $polioDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $polioReferenceNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $varicella = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $varicellaDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $varicellaReferenceNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pneumococcal = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $pneumococcalDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pneumococcalReferenceNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $influenza = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $influenzaDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $influenzaReferenceNumber = null;

    public function getCovid19(): ?string
    {
        return $this->covid19;
    }

    public function setCovid19(?string $covid19): static
    {
        $this->covid19 = $covid19;

        return $this;
    }

    public function getCovid19Date(): ?\DateTimeInterface
    {
        return $this->covid19Date;
    }

    public function setCovid19Date(?\DateTimeInterface $covid19Date): static
    {
        $this->covid19Date = $covid19Date;

        return $this;
    }

    public function getCovid19ReferenceNumber(): ?string
    {
        return $this->covid19ReferenceNumber;
    }

    public function setCovid19ReferenceNumber(?string $covid19ReferenceNumber): static
    {
        $this->covid19ReferenceNumber = $covid19ReferenceNumber;

        return $this;
    }

    public function getYellowFever(): ?string
    {
        return $this->yellowFever;
    }

    public function setYellowFever(?string $yellowFever): static
    {
        $this->yellowFever = $yellowFever;

        return $this;
    }

    public function getYellowFeverDate(): ?\DateTimeInterface
    {
        return $this->yellowFeverDate;
    }

    public function setYellowFeverDate(?\DateTimeInterface $yellowFeverDate): static
    {
        $this->yellowFeverDate = $yellowFeverDate;

        return $this;
    }

    public function getYellowFeverReferenceNumber(): ?string
    {
        return $this->yellowFeverReferenceNumber;
    }

    public function setYellowFeverReferenceNumber(?string $yellowFeverReferenceNumber): static
    {
        $this->yellowFeverReferenceNumber = $yellowFeverReferenceNumber;

        return $this;
    }

    public function getTetanus(): ?string
    {
        return $this->tetanus;
    }

    public function setTetanus(?string $tetanus): static
    {
        $this->tetanus = $tetanus;

        return $this;
    }

    public function getTetanusDate(): ?\DateTimeInterface
    {
        return $this->tetanusDate;
    }

    public function setTetanusDate(?\DateTimeInterface $tetanusDate): static
    {
        $this->tetanusDate = $tetanusDate;

        return $this;
    }

    public function getTetanusReferenceNumber(): ?string
    {
        return $this->tetanusReferenceNumber;
    }

    public function setTetanusReferenceNumber(?string $tetanusReferenceNumber): static
    {
        $this->tetanusReferenceNumber = $tetanusReferenceNumber;

        return $this;
    }

    public function getMmr(): ?string
    {
        return $this->mmr;
    }

    public function setMmr(?string $mmr): static
    {
        $this->mmr = $mmr;

        return $this;
    }

    public function getMmrDate(): ?\DateTimeInterface
    {
        return $this->mmrDate;
    }

    public function setMmrDate(?\DateTimeInterface $mmrDate): static
    {
        $this->mmrDate = $mmrDate;

        return $this;
    }

    public function getMmrReferenceNumber(): ?string
    {
        return $this->mmrReferenceNumber;
    }

    public function setMmrReferenceNumber(?string $mmrReferenceNumber): static
    {
        $this->mmrReferenceNumber = $mmrReferenceNumber;

        return $this;
    }

    public function getPolio(): ?string
    {
        return $this->polio;
    }

    public function setPolio(?string $polio): static
    {
        $this->polio = $polio;

        return $this;
    }

    public function getPolioDate(): ?\DateTimeInterface
    {
        return $this->polioDate;
    }

    public function setPolioDate(?\DateTimeInterface $polioDate): static
    {
        $this->polioDate = $polioDate;

        return $this;
    }

    public function getPolioReferenceNumber(): ?string
    {
        return $this->polioReferenceNumber;
    }

    public function setPolioReferenceNumber(?string $polioReferenceNumber): static
    {
        $this->polioReferenceNumber = $polioReferenceNumber;

        return $this;
    }

    public function getVaricella(): ?string
    {
        return $this->varicella;
    }

    public function setVaricella(?string $varicella): static
    {
        $this->varicella = $varicella;

        return $this;
    }

    public function getVaricellaDate(): ?\DateTimeInterface
    {
        return $this->varicellaDate;
    }

    public function setVaricellaDate(?\DateTimeInterface $varicellaDate): static
    {
        $this->varicellaDate = $varicellaDate;

        return $this;
    }

    public function getVaricellaReferenceNumber(): ?string
    {
        return $this->varicellaReferenceNumber;
    }

    public function setVaricellaReferenceNumber(?string $varicellaReferenceNumber): static
    {
        $this->varicellaReferenceNumber = $varicellaReferenceNumber;

        return $this;
    }

    public function getPneumococcal(): ?string
    {
        return $this->pneumococcal;
    }

    public function setPneumococcal(?string $pneumococcal): static
    {
        $this->pneumococcal = $pneumococcal;

        return $this;
    }

    public function getPneumococcalDate(): ?\DateTimeInterface
    {
        return $this->pneumococcalDate;
    }

    public function setPneumococcalDate(\DateTimeInterface $pneumococcalDate): static
    {
        $this->pneumococcalDate = $pneumococcalDate;

        return $this;
    }

    public function getPneumococcalReferenceNumber(): ?string
    {
        return $this->pneumococcalReferenceNumber;
    }

    public function setPneumococcalReferenceNumber(?string $pneumococcalReferenceNumber): static
    {
        $this->pneumococcalReferenceNumber = $pneumococcalReferenceNumber;

        return $this;
    }

    public function getInfluenza(): ?string
    {
        return $this->influenza;
    }

    public function setInfluenza(?string $influenza): static
    {
        $this->influenza = $influenza;

        return $this;
    }

    public function getInfluenzaDate(): ?\DateTimeInterface
    {
        return $this->influenzaDate;
    }

    public function setInfluenzaDate(?\DateTimeInterface $influenzaDate): static
    {
        $this->influenzaDate = $influenzaDate;

        return $this;
    }

    public function getInfluenzaReferenceNumber(): ?string
    {
        return $this->influenzaReferenceNumber;
    }

    public function setInfluenzaReferenceNumber(?string $influenzaReferenceNumber): static
    {
        $this->influenzaReferenceNumber = $influenzaReferenceNumber;

        return $this;
    }
}
