<?php

namespace App\Entity;

use App\Repository\ExamRPRRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamRPRRepository::class)]
class ExamRPR
{
    use CommonMedicalExamEntityTrait;
}
