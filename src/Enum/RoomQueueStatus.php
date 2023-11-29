<?php

namespace App\Enum;

class RoomQueueStatus
{

    public const ON_QUEUE = 'ON_QUEUE';
    public const IN_PROCESS = 'IN_PROCESS';
    public const PROCESSED = 'PROCESSED';

    // Optionally, you can define static methods or constants for these values
    public static function getStatusLabels(): array
    {
        return [
            self::ON_QUEUE => 'On Queue',
            self::IN_PROCESS => 'In Process',
            self::PROCESSED => 'Processed',
        ];
    }

}