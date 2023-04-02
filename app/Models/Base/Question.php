<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property User $user
 *
 * @package App\Models\Base
 */
class Question extends Model
{
    use SoftDeletes;

    const ID = 'id';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const STATUS = 'status';
    const USER_ID = 'user_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
    protected $table = 'questions';

    protected $casts = [
        self::ID => 'int',
        self::USER_ID => 'int',
        self::CREATED_AT => 'date',
        self::UPDATED_AT => 'date'
    ];

    protected $fillable = [
        self::TITLE,
        self::DESCRIPTION,
        self::STATUS,
        self::USER_ID
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
