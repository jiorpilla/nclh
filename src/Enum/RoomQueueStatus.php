<?php

namespace App\Enum;

enum RoomQueueStatus: string
{
    case ON_QUEUE = 'ON_QUEUE';
    case IN_PROCESS = 'IN_PROCESS';
    case PROCESSED = 'PROCESSED';
}