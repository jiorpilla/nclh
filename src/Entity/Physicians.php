<?php

namespace App\Entity;

use App\Repository\PhysiciansRepository;
use App\Utils\Traits\PersonEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhysiciansRepository::class)]
class Physicians
{
    use PersonEntityTrait;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $specialty = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $department = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $physician_license_number = null;

    public function getSpecialty(): ?string
    {
        return $this->specialty;
    }

    public function setSpecialty(?string $specialty): static
    {
        $this->specialty = $specialty;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(?string $department): static
    {
        $this->department = $department;

        return $this;
    }

    public function getPhysicianLicenseNumber(): ?string
    {
        return $this->physician_license_number;
    }

    public function setPhysicianLicenseNumber(?string $physician_license_number): static
    {
        $this->physician_license_number = $physician_license_number;

        return $this;
    }
}
