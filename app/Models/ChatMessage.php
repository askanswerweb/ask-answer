<?php

namespace App\Models;

use App\Models\Base\ChatMessage as BaseChatMessage;
use App\Traits\Models\ModelTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property User $sender
 * @property User $receiver
 *
 * @method static Builder seen()
 * @method static Builder unseen()
 */
class ChatMessage extends BaseChatMessage
{
    use ModelTrait, HasFactory;

    public function scopeSeen(Builder $builder): Builder
    {
        return $builder->where('chat_messages.seen', true);
    }

    public function scopeUnSeen(Builder $builder): Builder
    {
        return $builder->where('chat_messages.seen', false);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, self::SENDER_ID);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, self::RECEIVER_ID);
    }
}
