<?php

namespace App\Http\Enums;

use App\Traits\EnumToArray;

enum QuestionStatus: string
{
    use EnumToArray;

    case OPEN       = 'active';
    case RESOLVED   = 'resolved';
    case CLOSED     = 'closed';
}
