<?php

namespace App\Entity;

use App\Repository\ExamHbsAGRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamHbsAGRepository::class)]
class ExamHbsAG
{
    use CommonMedicalExamEntityTrait;
}
