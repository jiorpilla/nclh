<?php

namespace App\Utils\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UlidType;

trait UserAuditableEntityTrait
{

    #[ORM\Column(type: UlidType::NAME)]
    private $created_by = null;

    #[ORM\Column(type: UlidType::NAME)]
    private $updated_by = null;

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function setCreatedBy($created_by): static
    {
        $this->created_by = $created_by;

        return $this;
    }

    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    public function setUpdatedBy($updated_by): static
    {
        $this->updated_by = $updated_by;

        return $this;
    }

}