<?php

namespace App\Models;

use App\Business\States\Question\Open;
use App\Business\States\Question\QuestionState;
use App\Models\Base\Question as BaseQuestion;
use App\Traits\Models\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property QuestionState $status
 */
class Question extends BaseQuestion
{
    use ModelTrait, HasFactory;

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
}
