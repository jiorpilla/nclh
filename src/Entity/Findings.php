<?php

namespace App\Entity;

use App\Repository\FindingsRepository;
use App\Utils\Traits\CommonEntityTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: FindingsRepository::class)]
class Findings
{
    use CommonEntityTrait;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $findings = null;

    #[ORM\Column(type: 'ulid', nullable: true)]
    private ?Ulid $evaluator = null;

    public function getFindings(): ?string
    {
        return $this->findings;
    }

    public function setFindings(?string $findings): static
    {
        $this->findings = $findings;

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
