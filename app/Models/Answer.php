<?php

namespace App\Models;

use App\Models\Base\Answer as BaseAnswer;
use App\Traits\Models\MediaTrait;
use App\Traits\Models\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Answer extends BaseAnswer implements HasMedia
{
    use ModelTrait, HasFactory, MediaTrait;
}
