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
 * @method static Builder consultant()
 * @method static Builder notAdmin()
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

    public function isConsultant(): bool
    {
        return $this->role == UserRole::CONSULTANT->value;
    }

    public function isWorker(): bool
    {
        return $this->role == UserRole::WORKER->value;
    }

    public function isActive(): bool
    {
        return $this->status == ActiveStatus::ACTIVE->value;
    }

    public function getStatus(): string
    {
        return __("titles.$this->status");
    }

    public function getRole(): string
    {
        return __("titles.$this->role");
    }

    ########## MODEL SCOPES ##########
    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('users.status', ActiveStatus::ACTIVE->value);
    }

    public function scopeAdmin(Builder $builder): Builder
    {
        return $builder->where('users.role', UserRole::ADMIN->value);
    }

    public function scopeWorker(Builder $builder): Builder
    {
        return $builder->where('users.role', UserRole::WORKER->value);
    }

    public function scopeConsultant(Builder $builder): Builder
    {
        return $builder->where('users.role', UserRole::CONSULTANT->value);
    }

    public function scopeNotAdmin(Builder $builder): Builder
    {
        return $builder->where('users.role', '<>', UserRole::ADMIN->value);
    }
    ########## MODEL SCOPES ##########
}
