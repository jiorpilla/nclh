<?php

namespace App\Entity;

use App\Repository\ExamOvaAndParasitesRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamOvaAndParasitesRepository::class)]
class ExamOvaAndParasites
{
    use CommonMedicalExamEntityTrait;
}
