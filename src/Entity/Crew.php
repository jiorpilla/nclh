<?php

namespace App\Entity;

use App\Repository\CrewRepository;
use App\Utils\Traits\PersonEntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CrewRepository::class)]
class Crew
{
    use PersonEntityTrait;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $id_number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $position = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ship = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nationality = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $passport_number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $seaman_book_number = null;

    public function getIdNumber(): ?string
    {
        return $this->id_number;
    }

    public function setIdNumber(?string $id_number): static
    {
        $this->id_number = $id_number;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getShip(): ?string
    {
        return $this->ship;
    }

    public function setShip(?string $ship): static
    {
        $this->ship = $ship;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getPassportNumber(): ?string
    {
        return $this->passport_number;
    }

    public function setPassportNumber(?string $passport_number): static
    {
        $this->passport_number = $passport_number;

        return $this;
    }

    public function getSeamanBookNumber(): ?string
    {
        return $this->seaman_book_number;
    }

    public function setSeamanBookNumber(?string $seaman_book_number): static
    {
        $this->seaman_book_number = $seaman_book_number;

        return $this;
    }
}
