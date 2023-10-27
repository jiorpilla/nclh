<?php

namespace App\Utils\Traits;

trait CommonEntityTrait
{
    use IdentifiableEntityTrait, SoftDeletableEntityTrait, UserAuditableEntityTrait, TimestampableEntityTrait;
}