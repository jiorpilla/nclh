<?php

namespace App\Entity;

use App\Repository\ExamFecalysisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamFecalysisRepository::class)]
class ExamFecalysis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $result = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(string $result): static
    {
        $this->result = $result;

        return $this;
    }
}
