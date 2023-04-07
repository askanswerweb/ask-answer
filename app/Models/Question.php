<?php

namespace App\Models;

use App\Business\States\Question\Closed;
use App\Business\States\Question\Open;
use App\Business\States\Question\QuestionState;
use App\Business\States\Question\Resolved;
use App\Models\Base\Question as BaseQuestion;
use App\Traits\Models\MediaTrait;
use App\Traits\Models\ModelTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

/**
 * @property QuestionState $status
 *
 * @method static Builder open()
 * @method static Builder closed()
 * @method static Builder resolved()
 */
class Question extends BaseQuestion implements HasMedia
{
    use ModelTrait, HasFactory, MediaTrait;

    protected $casts = [
        self::ID => 'int',
        self::USER_ID => 'int',
        self::CREATED_AT => 'date',
        self::UPDATED_AT => 'date',
        self::STATUS => QuestionState::class
    ];

    public function isOpen(): bool
    {
        return $this->status->equals(Open::class);
    }

    public function isClosed(): bool
    {
        return $this->status->equals(Closed::class);
    }

    public function isResolved(): bool
    {
        return $this->status->equals(Resolved::class);
    }

    public function isForAuth(): bool
    {
        return $this->user_id == auth()->id();
    }

    public function scopeOpen(Builder $builder): Builder
    {
        return $builder->where('questions.status', Open::$name);
    }

    public function scopeClosed(Builder $builder): Builder
    {
        return $builder->where('questions.status', Closed::$name);
    }

    public function scopeResolved(Builder $builder): Builder
    {
        return $builder->where('questions.status', Resolved::$name);
    }
}
