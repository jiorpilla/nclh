<?php

namespace App\Entity;

use App\Repository\ExamBloodTypeRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamBloodTypeRepository::class)]
class ExamBloodType
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $bloodType = null;

    public function getBloodType(): ?string
    {
        return $this->bloodType;
    }

    public function setBloodType(?string $bloodType): static
    {
        $this->bloodType = $bloodType;

        return $this;
    }
}
