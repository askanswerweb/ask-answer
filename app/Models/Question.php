<?php

namespace App\Models;

use App\Models\Base\Question as BaseQuestion;
use App\Traits\Models\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends BaseQuestion
{
    use ModelTrait, HasFactory;
}
