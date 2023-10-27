<?php

namespace App\Utils\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
trait SoftDeletableEntityTrait
{
    #[ORM\Column(type: Types::SMALLINT, options: ["default" => 0])]
    private ?int $deleted = 0;

    public function getDeleted(): ?int
    {
        return $this->deleted;
    }

    public function setDeleted(int $deleted = 0): static
    {
        $this->deleted = $deleted;

        return $this;
    }
}