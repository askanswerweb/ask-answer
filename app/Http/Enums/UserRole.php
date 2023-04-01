<?php

namespace App\Http\Enums;

use App\Traits\EnumToArray;

enum UserRole: string
{
    use EnumToArray;

    case ADMIN  = 'admin';
    case WORKER = 'worker';
}
