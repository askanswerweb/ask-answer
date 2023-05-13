<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Answer;
use App\Models\Branch;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $role
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Answer[] $answers
 * @property Collection|Branch[] $branches
 * @property Collection|ChatMessage[] $chat_messages
 * @property Collection|Chat[] $chats
 * @property Collection|Question[] $questions
 *
 * @package App\Models\Base
 */
class User extends Model
{
    const ID = 'id';
    const NAME = 'name';
    const USERNAME = 'username';
    const PASSWORD = 'password';
    const ROLE = 'role';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'users';

    protected $casts = [
        self::ID => 'int',
        self::CREATED_AT => 'date',
        self::UPDATED_AT => 'date'
    ];

    protected $fillable = [
        self::NAME,
        self::USERNAME,
        self::PASSWORD,
        self::ROLE,
        self::STATUS
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function sender_messages()
    {
        return $this->hasMany(ChatMessage::class, ChatMessage::SENDER_ID);
    }

    public function receiver_messages()
    {
        return $this->hasMany(ChatMessage::class, ChatMessage::RECEIVER_ID);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, Chat::SENDER_ID);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
