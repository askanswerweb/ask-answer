<?php

namespace App\Models;

use App\Models\Base\Branch as BaseBranch;
use App\Traits\Models\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends BaseBranch
{
    use MediaTrait, HasFactory;
}
