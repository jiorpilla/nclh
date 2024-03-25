<?php

namespace App\Entity;

use App\Repository\ExamAudiometryRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamAudiometryRepository::class)]
class ExamAudiometry
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $right500 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $right1000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $right2000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $right3000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $right4000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $right6000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $right8000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $left500 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $left1000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $left2000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $left3000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $left4000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $left6000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $left8000 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rightWhisper = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $leftWhisper = null;

    public function getRight500(): ?string
    {
        return $this->right500;
    }

    public function setRight500(?string $right500): static
    {
        $this->right500 = $right500;

        return $this;
    }

    public function getRight1000(): ?string
    {
        return $this->right1000;
    }

    public function setRight1000(?string $right1000): static
    {
        $this->right1000 = $right1000;

        return $this;
    }

    public function getRight2000(): ?string
    {
        return $this->right2000;
    }

    public function setRight2000(?string $right2000): static
    {
        $this->right2000 = $right2000;

        return $this;
    }

    public function getRight3000(): ?string
    {
        return $this->right3000;
    }

    public function setRight3000(?string $right3000): static
    {
        $this->right3000 = $right3000;

        return $this;
    }

    public function getRight4000(): ?string
    {
        return $this->right4000;
    }

    public function setRight4000(?string $right4000): static
    {
        $this->right4000 = $right4000;

        return $this;
    }

    public function getRight6000(): ?string
    {
        return $this->right6000;
    }

    public function setRight6000(?string $right6000): static
    {
        $this->right6000 = $right6000;

        return $this;
    }

    public function getRight8000(): ?string
    {
        return $this->right8000;
    }

    public function setRight8000(?string $right8000): static
    {
        $this->right8000 = $right8000;

        return $this;
    }

    public function getLeft500(): ?string
    {
        return $this->left500;
    }

    public function setLeft500(?string $left500): static
    {
        $this->left500 = $left500;

        return $this;
    }

    public function getLeft1000(): ?string
    {
        return $this->left1000;
    }

    public function setLeft1000(?string $left1000): static
    {
        $this->left1000 = $left1000;

        return $this;
    }

    public function getLeft2000(): ?string
    {
        return $this->left2000;
    }

    public function setLeft2000(?string $left2000): static
    {
        $this->left2000 = $left2000;

        return $this;
    }

    public function getLeft3000(): ?string
    {
        return $this->left3000;
    }

    public function setLeft3000(?string $left3000): static
    {
        $this->left3000 = $left3000;

        return $this;
    }

    public function getLeft4000(): ?string
    {
        return $this->left4000;
    }

    public function setLeft4000(?string $left4000): static
    {
        $this->left4000 = $left4000;

        return $this;
    }

    public function getLeft6000(): ?string
    {
        return $this->left6000;
    }

    public function setLeft6000(?string $left6000): static
    {
        $this->left6000 = $left6000;

        return $this;
    }

    public function getLeft8000(): ?string
    {
        return $this->left8000;
    }

    public function setLeft8000(?string $left8000): static
    {
        $this->left8000 = $left8000;

        return $this;
    }

    public function getRightWhisper(): ?string
    {
        return $this->rightWhisper;
    }

    public function setRightWhisper(?string $rightWhisper): static
    {
        $this->rightWhisper = $rightWhisper;

        return $this;
    }

    public function getLeftWhisper(): ?string
    {
        return $this->leftWhisper;
    }

    public function setLeftWhisper(?string $leftWhisper): static
    {
        $this->leftWhisper = $leftWhisper;

        return $this;
    }
}
