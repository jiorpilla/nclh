<?php

namespace App\Entity;

use App\Repository\AssessmentsRepository;
use App\Utils\Traits\CommonEntityTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: AssessmentsRepository::class)]
class Assessments
{
    use CommonEntityTrait;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $text = null;

    #[ORM\Column(type: 'ulid', nullable: true)]
    private ?Ulid $evaluator = null;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getEvaluator(): ?Ulid
    {
        return $this->evaluator;
    }

    public function setEvaluator(?Ulid $evaluator): static
    {
        $this->evaluator = $evaluator;

        return $this;
    }
}
