<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Branch
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class Branch extends Model
{
	const ID = 'id';
	const NAME = 'name';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	protected $table = 'branches';

	protected $casts = [
		self::ID => 'int',
		self::CREATED_AT => 'date',
		self::UPDATED_AT => 'date'
	];

	protected $fillable = [
		self::NAME
	];

	public function users()
	{
		return $this->belongsToMany(User::class);
	}
}
