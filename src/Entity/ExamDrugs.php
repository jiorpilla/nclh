<?php

namespace App\Entity;

use App\Repository\ExamDrugsRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamDrugsRepository::class)]
class ExamDrugs
{
    use CommonMedicalExamEntityTrait;
}
