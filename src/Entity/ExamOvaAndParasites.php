<?php

namespace App\Entity;

use App\Repository\ExamOvaAndParasitesRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamOvaAndParasitesRepository::class)]
class ExamOvaAndParasites
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $result = null;

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(?string $result): static
    {
        $this->result = $result;

        return $this;
    }
}
