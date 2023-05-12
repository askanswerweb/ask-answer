<?php

namespace App\Models;

use App\Models\Base\Chat as BaseChat;
use App\Traits\Models\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends BaseChat
{
    use ModelTrait, HasFactory;
}
