<?php

namespace App\Entity;

use App\Repository\ExamChestXrayRepository;
use App\Utils\Traits\CommonMedicalExamEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamChestXrayRepository::class)]
class ExamChestXray
{
    use CommonMedicalExamEntityTrait;
}
