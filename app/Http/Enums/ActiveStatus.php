<?php

namespace App\Http\Enums;

use App\Traits\EnumToArray;

enum ActiveStatus: string
{
    use EnumToArray;

    case ACTIVE  = 'active';
    case INACTIVE = 'inactive';
}
