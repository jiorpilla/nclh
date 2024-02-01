<?php

namespace App\Entity;

use App\Repository\ExamRibaRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamRibaRepository::class)]
class ExamRiba
{
    use CommonMedicalExamEntityTrait;
}
