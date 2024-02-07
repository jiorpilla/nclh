<?php

namespace App\Entity;

use App\Repository\ExamPSARepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamPSARepository::class)]
class ExamPSA
{
    use CommonMedicalExamEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $psa = null;

    public const RESULT_ABNORMAL = 0;
    public const RESULT_NORMAL   = 1;

    public function isPsa(): ?string
    {
        return $this->psa;
    }

    public function setPsa(?string $psa): static
    {
        $this->psa = $psa;

        return $this;
    }
}
