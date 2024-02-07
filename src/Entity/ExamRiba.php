<?php

namespace App\Entity;

use App\Repository\ExamRibaRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamRibaRepository::class)]
class ExamRiba
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
