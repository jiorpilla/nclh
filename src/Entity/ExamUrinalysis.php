<?php

namespace App\Entity;

use App\Repository\ExamUrinalysisRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamUrinalysisRepository::class)]
class ExamUrinalysis
{
    use CommonMedicalExamEntityTrait;
}
