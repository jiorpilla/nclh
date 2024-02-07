<?php

namespace App\Entity;

use App\Repository\ExamPregnancyTestRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamPregnancyTestRepository::class)]
class ExamPregnancyTest
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(nullable: true)]
    private ?bool $pregnancyTest = null;

    public const RESULT_NEGATIVE = 0;
    public const RESULT_POSITIVE = 1;

    public function isPregnancyTest(): ?bool
    {
        return $this->pregnancyTest;
    }

    public function setPregnancyTest(?bool $pregnancyTest): static
    {
        $this->pregnancyTest = $pregnancyTest;

        return $this;
    }
}
