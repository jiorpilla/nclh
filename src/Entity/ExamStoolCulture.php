<?php

namespace App\Entity;

use App\Repository\ExamStoolCultureRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamStoolCultureRepository::class)]
class ExamStoolCulture
{
    use CommonMedicalExamEntityTrait;
}
