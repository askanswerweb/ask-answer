<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Answer;
use App\Models\Branch;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $close_reason
 * @property string $status
 * @property int $user_id
 * @property int $branch_id
 * @property int $assignee_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property User $user
 * @property Branch $branch
 * @property Collection|Answer[] $answers
 *
 * @package App\Models\Base
 */
class Question extends Model
{
	use SoftDeletes;
	const ID = 'id';
	const TITLE = 'title';
	const DESCRIPTION = 'description';
	const CLOSE_REASON = 'close_reason';
	const STATUS = 'status';
	const USER_ID = 'user_id';
	const BRANCH_ID = 'branch_id';
    const ASSIGNEE_ID = 'assignee_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	protected $table = 'questions';

	protected $casts = [
		self::ID => 'int',
		self::USER_ID => 'int',
		self::BRANCH_ID => 'int',
		self::CREATED_AT => 'date',
		self::UPDATED_AT => 'date'
	];

	protected $fillable = [
		self::TITLE,
		self::DESCRIPTION,
		self::CLOSE_REASON,
		self::STATUS,
		self::USER_ID,
		self::BRANCH_ID,
		self::ASSIGNEE_ID,
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function branch()
	{
		return $this->belongsTo(Branch::class);
	}

	public function answers()
	{
		return $this->hasMany(Answer::class);
	}
}
