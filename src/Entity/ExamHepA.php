<?php

namespace App\Entity;

use App\Repository\ExamHepARepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamHepARepository::class)]
class ExamHepA
{
    use CommonMedicalExamEntityTrait;
}
