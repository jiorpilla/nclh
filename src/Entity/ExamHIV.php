<?php

namespace App\Entity;

use App\Repository\ExamHIVRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamHIVRepository::class)]
class ExamHIV
{
    use CommonMedicalExamEntityTrait;
}
