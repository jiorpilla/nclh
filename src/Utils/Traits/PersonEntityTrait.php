<?php

namespace App\Utils\Traits;

use DateTime;
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
    private ?string $address = null;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }
    /**
     * get FUllname on fullname format
     * LastName, FirstName {{ crew.middleName|first }}., {{ crew.suffix }}
     * @return string|null
     */
    public function getFullName(): ?string
    {
        $fullname = $this->getLastName() . ", " .  $this->getFirstName() . " " .  substr($this->getMiddleName(), 0, 1) . ".";
        if($this->getSuffix()){
            $fullname .= ', ' . $this->suffix;
        }
        return $fullname;
    }

    /**
     * Calculate the age based on the birthdate
     *
     * @return int|null
     */
    public function getAge(): ?int
    {
        $now = new DateTime();
        $date_of_birth = $this->getDateOfBirth();

        if ($date_of_birth instanceof DateTime) {
            $interval = $now->diff($date_of_birth);
            return $interval->y;
        }

        return null; // or handle it differently based on your use case
    }
}