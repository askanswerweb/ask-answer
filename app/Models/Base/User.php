<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
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
}
