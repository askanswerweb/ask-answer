<?php

namespace App\Models;

use App\Models\Base\ChatMessage as BaseChatMessage;
use App\Traits\Models\ModelTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static Builder seen()
 * @method static Builder unseen()
 */
class ChatMessage extends BaseChatMessage
{
    use ModelTrait, HasFactory;

    public function scopeSeen(Builder $builder): Builder
    {
        return $builder->where('chats.seen', true);
    }

    public function scopeUnSeen(Builder $builder): Builder
    {
        return $builder->where('chats.seen', false);
    }
}
