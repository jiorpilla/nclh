<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use App\Utils\Traits\CommonEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UlidType;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    use CommonEntityTrait;

    final public const ROLE_CREW        = 'ROLE_CREW';
    final public const ROLE_NURSE       = 'ROLE_NURSE';
    final public const ROLE_PHYSICIAN   = 'ROLE_PHYSICIAN';
    final public const ROLE_ADMIN       = 'ROLE_ADMIN';
    final public const ROLE_SUPERADMIN       = 'ROLE_SUPERADMIN';

    #[ORM\Column(length: 180, unique: true)]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;


    #[ORM\Column(type: 'ulid', nullable: true)]
    private ?Ulid $physician_id = null;

    #[ORM\Column(type: 'ulid', nullable: true)]
    private ?Ulid $nurse_id = null;

    #[ORM\Column(type: 'ulid', nullable: true)]
    private ?Ulid $crew_id = null;

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        // guarantees that a user always has at least one role for security
        if (empty($roles)) {
            $roles[] = self::ROLE_CREW;
        }
        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPhysicianId(): ?Ulid
    {
        return $this->physician_id;
    }

    public function setPhysicianId(?Ulid $physician_id): static
    {
        $this->physician_id = $physician_id;

        return $this;
    }

    public function getNurseId(): ?Ulid
    {
        return $this->nurse_id;
    }

    public function setNurseId(?Ulid $nurse_id): static
    {
        $this->nurse_id = $nurse_id;

        return $this;
    }

    public function getCrewId(): ?Ulid
    {
        return $this->crew_id;
    }

    public function setCrewId(?Ulid $crew_id): static
    {
        $this->crew_id = $crew_id;

        return $this;
    }
}
