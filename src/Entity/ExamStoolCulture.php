<?php

namespace App\Entity;

use App\Repository\ExamStoolCultureRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamStoolCultureRepository::class)]
class ExamStoolCulture
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $culture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $parasitology = null;

    public function getCulture(): ?string
    {
        return $this->culture;
    }

    public function setCulture(?string $culture): static
    {
        $this->culture = $culture;

        return $this;
    }

    public function getParasitology(): ?string
    {
        return $this->parasitology;
    }

    public function setParasitology(?string $parasitology): static
    {
        $this->parasitology = $parasitology;

        return $this;
    }
}
