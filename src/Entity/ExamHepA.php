<?php

namespace App\Entity;

use App\Repository\ExamHepARepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamHepARepository::class)]
class ExamHepA
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $result = null;

    public const RESULT_ABNORMAL = 0;
    public const RESULT_NORMAL   = 1;

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
