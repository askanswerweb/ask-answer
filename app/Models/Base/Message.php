<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * 
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string $message
 * @property bool $seen
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models\Base
 */
class Message extends Model
{
	const ID = 'id';
	const SENDER_ID = 'sender_id';
	const RECEIVER_ID = 'receiver_id';
	const MESSAGE = 'message';
	const SEEN = 'seen';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	protected $table = 'messages';

	protected $casts = [
		self::ID => 'int',
		self::SENDER_ID => 'int',
		self::RECEIVER_ID => 'int',
		self::SEEN => 'bool',
		self::CREATED_AT => 'date',
		self::UPDATED_AT => 'date'
	];

	protected $fillable = [
		self::SENDER_ID,
		self::RECEIVER_ID,
		self::MESSAGE,
		self::SEEN
	];

	public function user()
	{
		return $this->belongsTo(User::class, \App\Models\Message::SENDER_ID);
	}
}
