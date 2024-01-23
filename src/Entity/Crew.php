<?php

namespace App\Entity;

use App\Repository\CrewRepository;
use App\Utils\Traits\ImageUploadEntityTrait;
use App\Utils\Traits\PersonEntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: CrewRepository::class)]
#[Vich\Uploadable]
class Crew
{
    use PersonEntityTrait;
    use ImageUploadEntityTrait;

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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $company = null;

    #[ORM\Column(nullable: true)]
    private ?int $type = null;

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

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): static
    {
        $this->company = $company;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): static
    {
        $this->type = $type;

        return $this;
    }
}
