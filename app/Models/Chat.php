<?php

namespace App\Models;

use App\Models\Base\Chat as BaseChat;
use App\Traits\Models\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property User $sender
 * @property User $receiver
 */
class Chat extends BaseChat
{
    use ModelTrait, HasFactory;

    public function sender()
    {
        return $this->belongsTo(User::class, self::SENDER_ID);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, self::RECEIVER_ID);
    }
}
