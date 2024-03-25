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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heentMouth = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heentTonsil = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heentPharynx = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heentEars = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heentEyes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $neckNodes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $neckMotion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $neckThyroid = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emotionalStatus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $romCervicalFF = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $romCervicalE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $romCervicalLF = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $romCervicalR = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $romShoulderFE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $romShoulderBE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $romShoulderAb = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $romShoulderAd = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $romShoulderIR = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $romShoulderER = null;

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

    public function getHeentMouth(): ?string
    {
        return $this->heentMouth;
    }

    public function setHeentMouth(?string $heentMouth): static
    {
        $this->heentMouth = $heentMouth;

        return $this;
    }

    public function getHeentTonsil(): ?string
    {
        return $this->heentTonsil;
    }

    public function setHeentTonsil(?string $heentTonsil): static
    {
        $this->heentTonsil = $heentTonsil;

        return $this;
    }

    public function getHeentPharynx(): ?string
    {
        return $this->heentPharynx;
    }

    public function setHeentPharynx(?string $heentPharynx): static
    {
        $this->heentPharynx = $heentPharynx;

        return $this;
    }

    public function getHeentEars(): ?string
    {
        return $this->heentEars;
    }

    public function setHeentEars(?string $heentEars): static
    {
        $this->heentEars = $heentEars;

        return $this;
    }

    public function getHeentEyes(): ?string
    {
        return $this->heentEyes;
    }

    public function setHeentEyes(?string $heentEyes): static
    {
        $this->heentEyes = $heentEyes;

        return $this;
    }

    public function getNeckNodes(): ?string
    {
        return $this->neckNodes;
    }

    public function setNeckNodes(?string $neckNodes): static
    {
        $this->neckNodes = $neckNodes;

        return $this;
    }

    public function getNeckMotion(): ?string
    {
        return $this->neckMotion;
    }

    public function setNeckMotion(?string $neckMotion): static
    {
        $this->neckMotion = $neckMotion;

        return $this;
    }

    public function getNeckThyroid(): ?string
    {
        return $this->neckThyroid;
    }

    public function setNeckThyroid(?string $neckThyroid): static
    {
        $this->neckThyroid = $neckThyroid;

        return $this;
    }

    public function getEmotionalStatus(): ?string
    {
        return $this->emotionalStatus;
    }

    public function setEmotionalStatus(?string $emotionalStatus): static
    {
        $this->emotionalStatus = $emotionalStatus;

        return $this;
    }

    public function getRomCervicalFF(): ?string
    {
        return $this->romCervicalFF;
    }

    public function setRomCervicalFF(?string $romCervicalFF): static
    {
        $this->romCervicalFF = $romCervicalFF;

        return $this;
    }

    public function getRomCervicalE(): ?string
    {
        return $this->romCervicalE;
    }

    public function setRomCervicalE(?string $romCervicalE): static
    {
        $this->romCervicalE = $romCervicalE;

        return $this;
    }

    public function getRomCervicalLF(): ?string
    {
        return $this->romCervicalLF;
    }

    public function setRomCervicalLF(?string $romCervicalLF): static
    {
        $this->romCervicalLF = $romCervicalLF;

        return $this;
    }

    public function getRomCervicalR(): ?string
    {
        return $this->romCervicalR;
    }

    public function setRomCervicalR(?string $romCervicalR): static
    {
        $this->romCervicalR = $romCervicalR;

        return $this;
    }

    public function getRomShoulderFE(): ?string
    {
        return $this->romShoulderFE;
    }

    public function setRomShoulderFE(?string $romShoulderFE): static
    {
        $this->romShoulderFE = $romShoulderFE;

        return $this;
    }

    public function getRomShoulderBE(): ?string
    {
        return $this->romShoulderBE;
    }

    public function setRomShoulderBE(?string $romShoulderBE): static
    {
        $this->romShoulderBE = $romShoulderBE;

        return $this;
    }

    public function getRomShoulderAb(): ?string
    {
        return $this->romShoulderAb;
    }

    public function setRomShoulderAb(?string $romShoulderAb): static
    {
        $this->romShoulderAb = $romShoulderAb;

        return $this;
    }

    public function getRomShoulderAd(): ?string
    {
        return $this->romShoulderAd;
    }

    public function setRomShoulderAd(?string $romShoulderAd): static
    {
        $this->romShoulderAd = $romShoulderAd;

        return $this;
    }

    public function getRomShoulderIR(): ?string
    {
        return $this->romShoulderIR;
    }

    public function setRomShoulderIR(?string $romShoulderIR): static
    {
        $this->romShoulderIR = $romShoulderIR;

        return $this;
    }

    public function getRomShoulderER(): ?string
    {
        return $this->romShoulderER;
    }

    public function setRomShoulderER(?string $romShoulderER): static
    {
        $this->romShoulderER = $romShoulderER;

        return $this;
    }
}
