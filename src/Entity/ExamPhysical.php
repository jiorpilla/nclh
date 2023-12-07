<?php

namespace App\Entity;

use App\Repository\ExamPhysicalRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamPhysicalRepository::class)]
class ExamPhysical
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $temperature = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $spo2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $respiration = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $bp = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $height = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $weight = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bmi = null;

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(?string $temperature): static
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getSpo2(): ?string
    {
        return $this->spo2;
    }

    public function setSpo2(?string $spo2): static
    {
        $this->spo2 = $spo2;

        return $this;
    }

    public function getRespiration(): ?string
    {
        return $this->respiration;
    }

    public function setRespiration(?string $respiration): static
    {
        $this->respiration = $respiration;

        return $this;
    }

    public function getBp(): ?string
    {
        return $this->bp;
    }

    public function setBp(?string $bp): static
    {
        $this->bp = $bp;

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function setHeight(?string $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getBmi(): ?string
    {
        return $this->bmi;
    }

    public function setBmi(?string $bmi): static
    {
        $this->bmi = $bmi;

        return $this;
    }
}
