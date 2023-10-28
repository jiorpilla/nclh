<?php

namespace App\Utils\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait PersonEntityTrait
{
    use CommonEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $middle_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $suffix = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $gender = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_of_birth = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location_of_birth = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $phone_number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $civil_status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address_text = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $address_street = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $address_barangay = null;

    #[ORM\Column(length: 50)]
    private ?string $address_city = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $address_province = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $address_region = null;

    #[ORM\Column(nullable: true)]
    private ?int $address_postalcode = null;

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): static
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middle_name;
    }

    public function setMiddleName(?string $middle_name): static
    {
        $this->middle_name = $middle_name;

        return $this;
    }

    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    public function setSuffix(?string $suffix): static
    {
        $this->suffix = $suffix;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(?\DateTimeInterface $date_of_birth): static
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getLocationOfBirth(): ?string
    {
        return $this->location_of_birth;
    }

    public function setLocationOfBirth(?string $location_of_birth): static
    {
        $this->location_of_birth = $location_of_birth;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): static
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCivilStatus(): ?int
    {
        return $this->civil_status;
    }

    public function setCivilStatus(?int $civil_status): static
    {
        $this->civil_status = $civil_status;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getAddressText(): ?string
    {
        return $this->address_text;
    }

    public function setAddressText(?string $address_text): static
    {
        $this->address_text = $address_text;

        return $this;
    }

    public function getAddressStreet(): ?string
    {
        return $this->address_street;
    }

    public function setAddressStreet(?string $address_street): static
    {
        $this->address_street = $address_street;

        return $this;
    }

    public function getAddressBarangay(): ?string
    {
        return $this->address_barangay;
    }

    public function setAddressBarangay(?string $address_barangay): static
    {
        $this->address_barangay = $address_barangay;

        return $this;
    }

    public function getAddressCity(): ?string
    {
        return $this->address_city;
    }

    public function setAddressCity(string $address_city): static
    {
        $this->address_city = $address_city;

        return $this;
    }

    public function getAddressProvince(): ?string
    {
        return $this->address_province;
    }

    public function setAddressProvince(?string $address_province): static
    {
        $this->address_province = $address_province;

        return $this;
    }

    public function getAddressRegion(): ?string
    {
        return $this->address_region;
    }

    public function setAddressRegion(?string $address_region): static
    {
        $this->address_region = $address_region;

        return $this;
    }

    public function getAddressPostalcode(): ?int
    {
        return $this->address_postalcode;
    }

    public function setAddressPostalcode(?int $address_postalcode): static
    {
        $this->address_postalcode = $address_postalcode;

        return $this;
    }
}