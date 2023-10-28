<?php

namespace App\Entity;

use App\Repository\NursesRepository;
use App\Utils\Traits\PersonEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NursesRepository::class)]
class Nurses
{
    use PersonEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $department = null;

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(?string $department): static
    {
        $this->department = $department;

        return $this;
    }
}
