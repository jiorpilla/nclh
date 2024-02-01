<?php

namespace App\Entity;

use App\Repository\ExamCBCRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamCBCRepository::class)]
class ExamCBC
{
    use CommonMedicalExamEntityTrait;
}
