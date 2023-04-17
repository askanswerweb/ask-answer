<?php

namespace App\Models;

use App\Models\Base\Branch as BaseBranch;
use App\Traits\Models\ModelTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static Builder select2()
 */
class Branch extends BaseBranch
{
    use ModelTrait, HasFactory;

    ################ START::SCOPES ################
    public function scopeSelect2(Builder $builder): Builder
    {
        return $builder->select(['branches.id', 'branches.name AS full_text']);
    }
    ################ END::SCOPES ##################
}
