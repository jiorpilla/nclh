<?php

namespace App\Entity;

use App\Repository\ExamChestXrayRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamChestXrayRepository::class)]
class ExamChestXray
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bonyCage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heart = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lungs = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $diaphragms = null;

    public const RESULT_ABNORMAL = 0;
    public const RESULT_NORMAL   = 1;

    public function getBonyCage(): ?string
    {
        return $this->bonyCage;
    }

    public function setBonyCage(string $bonyCage): static
    {
        $this->bonyCage = $bonyCage;

        return $this;
    }

    public function isHeart(): ?string
    {
        return $this->heart;
    }

    public function setHeart(string $heart): static
    {
        $this->heart = $heart;

        return $this;
    }

    public function isLungs(): ?string
    {
        return $this->lungs;
    }

    public function setLungs(string $lungs): static
    {
        $this->lungs = $lungs;

        return $this;
    }

    public function isDiaphragms(): ?string
    {
        return $this->diaphragms;
    }

    public function setDiaphragms(?string $diaphragms): static
    {
        $this->diaphragms = $diaphragms;

        return $this;
    }
}
