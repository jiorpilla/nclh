<?php

namespace App\Entity;

use App\Repository\ExamPSARepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamPSARepository::class)]
class ExamPSA
{
    use CommonMedicalExamEntityTrait;
}
