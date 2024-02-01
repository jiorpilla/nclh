<?php

namespace App\Entity;

use App\Repository\ExamPregnancyTestRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamPregnancyTestRepository::class)]
class ExamPregnancyTest
{
    use CommonMedicalExamEntityTrait;
}
