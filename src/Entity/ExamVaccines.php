<?php

namespace App\Entity;

use App\Repository\ExamVaccinesRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamVaccinesRepository::class)]
class ExamVaccines
{
    use CommonMedicalExamEntityTrait;
}
