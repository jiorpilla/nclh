<?php

namespace App\Entity;

use App\Repository\AppointeeRepository;
use App\Utils\Traits\PersonEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointeeRepository::class)]
class Appointee
{
    use PersonEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $company = null;

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): static
    {
        $this->company = $company;

        return $this;
    }
}
