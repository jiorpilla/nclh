<?php

namespace App\Entity;

use App\Repository\ExamBloodChemistryRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamBloodChemistryRepository::class)]
class ExamBloodChemistry
{
    use CommonMedicalExamEntityTrait;
}
