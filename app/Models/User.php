<?php

namespace App\Models;

use App\Business\Utilities\Strings;
use App\Http\Enums\ActiveStatus;
use App\Http\Enums\UserRole;
use App\Models\Base\User as BaseUser;
use App\Traits\Models\ModelTrait;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static Builder active()
 * @method static Builder admin()
 * @method static Builder worker()
 */
class User extends BaseUser implements Authenticatable
{
    use HasApiTokens, AuthenticatableTrait, ModelTrait, HasFactory;

    public function firstLetter(): string
    {
        return Strings::firstLetter($this->name);
    }

    public function firstName(): string
    {
        return Strings::firstWord($this->name);
    }

    public function isAdmin(): bool
    {
        return $this->role == UserRole::ADMIN->value;
    }

    public function isActive(): bool
    {
        return $this->status == ActiveStatus::ACTIVE->value;
    }

    public function getStatus(): string
    {
        return __("titles.$this->status");
    }

    ########## MODEL SCOPES ##########
    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('users.status', '');
    }

    public function scopeAdmin(Builder $builder): Builder
    {
        return $builder->where('users.role', UserRole::ADMIN->value);
    }

    public function scopeWorker(Builder $builder): Builder
    {
        return $builder->where('users.role', UserRole::WORKER->value);
    }
    ########## MODEL SCOPES ##########
}
