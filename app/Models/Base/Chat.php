<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChatMessage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chat
 * 
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|ChatMessage[] $chat_messages
 *
 * @package App\Models\Base
 */
class Chat extends Model
{
	const ID = 'id';
	const SENDER_ID = 'sender_id';
	const RECEIVER_ID = 'receiver_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	protected $table = 'chats';

	protected $casts = [
		self::ID => 'int',
		self::SENDER_ID => 'int',
		self::RECEIVER_ID => 'int',
		self::CREATED_AT => 'date',
		self::UPDATED_AT => 'date'
	];

	protected $fillable = [
		self::SENDER_ID,
		self::RECEIVER_ID
	];

	public function user()
	{
		return $this->belongsTo(User::class, \App\Models\Chat::SENDER_ID);
	}

	public function chat_messages()
	{
		return $this->hasMany(ChatMessage::class);
	}
}
