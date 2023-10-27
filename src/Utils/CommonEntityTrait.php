<?php

namespace App\Utils;

use App\Utils\Traits\IdentifiableEntityTrait;
use App\Utils\Traits\SoftDeletableEntityTrait;
use App\Utils\Traits\TimestampableEntityTrait;
use App\Utils\Traits\UserAuditableEntityTrait;

trait CommonEntityTrait
{
    use IdentifiableEntityTrait, SoftDeletableEntityTrait, UserAuditableEntityTrait, TimestampableEntityTrait;
}