<?php

namespace App\Entity;

use App\Repository\ExamAudiometryRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamAudiometryRepository::class)]
class ExamAudiometry
{
    use CommonMedicalExamEntityTrait;
}
