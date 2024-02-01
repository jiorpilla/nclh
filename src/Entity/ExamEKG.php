<?php

namespace App\Entity;

use App\Repository\ExamEKGRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamEKGRepository::class)]
class ExamEKG
{
    use CommonMedicalExamEntityTrait;
}
