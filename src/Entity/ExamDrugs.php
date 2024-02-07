<?php

namespace App\Entity;

use App\Repository\ExamDrugsRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamDrugsRepository::class)]
class ExamDrugs
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cocaine = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $marijuana = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $opiates = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $amphetamine = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phencyclidine = null;

    public const RESULT_ABNORMAL = 0;
    public const RESULT_NORMAL   = 1;

    public function getCocaine(): ?string
    {
        return $this->cocaine;
    }

    public function setCocaine(?string $cocaine): static
    {
        $this->cocaine = $cocaine;

        return $this;
    }

    public function getMarijuana(): ?string
    {
        return $this->marijuana;
    }

    public function setMarijuana(?string $marijuana): static
    {
        $this->marijuana = $marijuana;

        return $this;
    }

    public function getOpiates(): ?string
    {
        return $this->opiates;
    }

    public function setOpiates(?string $opiates): static
    {
        $this->opiates = $opiates;

        return $this;
    }

    public function getAmphetamine(): ?string
    {
        return $this->amphetamine;
    }

    public function setAmphetamine(?string $amphetamine): static
    {
        $this->amphetamine = $amphetamine;

        return $this;
    }

    public function getPhencyclidine(): ?string
    {
        return $this->phencyclidine;
    }

    public function setPhencyclidine(?string $phencyclidine): static
    {
        $this->phencyclidine = $phencyclidine;

        return $this;
    }
}
