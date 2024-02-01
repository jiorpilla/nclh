<?php

namespace App\Entity;

use App\Repository\ExamPsychologicalRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamPsychologicalRepository::class)]
class ExamPsychological
{
    use CommonMedicalExamEntityTrait;
}
