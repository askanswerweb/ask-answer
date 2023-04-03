<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * 
 * @property int $id
 * @property string $content
 * @property int $question_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Question $question
 * @property User $user
 *
 * @package App\Models\Base
 */
class Answer extends Model
{
	const ID = 'id';
	const CONTENT = 'content';
	const QUESTION_ID = 'question_id';
	const USER_ID = 'user_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	protected $table = 'answers';

	protected $casts = [
		self::ID => 'int',
		self::QUESTION_ID => 'int',
		self::USER_ID => 'int',
		self::CREATED_AT => 'date',
		self::UPDATED_AT => 'date'
	];

	protected $fillable = [
		self::CONTENT,
		self::QUESTION_ID,
		self::USER_ID
	];

	public function question()
	{
		return $this->belongsTo(Question::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
