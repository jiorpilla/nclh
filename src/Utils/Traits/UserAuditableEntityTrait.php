<?php

namespace App\Utils\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UlidType;
use Symfony\Component\Uid\Ulid;

trait UserAuditableEntityTrait
{

    #[ORM\Column(type: UlidType::NAME)]
    private ?Ulid $created_by = null;

    #[ORM\Column(type: UlidType::NAME)]
    private ?Ulid $updated_by = null;

    public function getCreatedBy():?Ulid
    {
        return $this->created_by;
    }

    public function setCreatedBy(?Ulid $created_by): static
    {
        $this->created_by = $created_by;

        return $this;
    }

    public function getUpdatedBy():?Ulid
    {
        return $this->updated_by;
    }

    public function setUpdatedBy(?Ulid $updated_by): static
    {
        $this->updated_by = $updated_by;

        return $this;
    }

}