<?php

namespace App\Entity;

use App\Repository\ExamVisualAcuityRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamVisualAcuityRepository::class)]
class ExamVisualAcuity
{
    use CommonMedicalExamEntityTrait;
}
