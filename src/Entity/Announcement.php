<?php

namespace App\Entity;

use App\Repository\AnnouncementRepository;
use App\Utils\Traits\CommonEntityTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnouncementRepository::class)]
class Announcement
{
    use CommonEntityTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $postStart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $postEnd = null;

    #[ORM\Column(nullable: true)]
    private ?array $targetRoles = null;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPostStart(): ?\DateTimeInterface
    {
        return $this->postStart;
    }

    public function setPostStart(?\DateTimeInterface $postStart): static
    {
        $this->postStart = $postStart;

        return $this;
    }

    public function getPostEnd(): ?\DateTimeInterface
    {
        return $this->postEnd;
    }

    public function setPostEnd(?\DateTimeInterface $postEnd): static
    {
        $this->postEnd = $postEnd;

        return $this;
    }

    public function getTargetRoles(): ?array
    {
        return $this->targetRoles;
    }

    public function setTargetRoles(?array $targetRoles): static
    {
        $this->targetRoles = $targetRoles;

        return $this;
    }
}
