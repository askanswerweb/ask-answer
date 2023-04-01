<?php

namespace App\Traits\Models;

use App\Business\Utilities\Dates;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static int count()
 * @method static Collection|static[] get($columns = ['*'])
 * @method static Model|static pluck(string|array $columns)
 * @method static Model|static insert(array $columns)
 * @method static Model|static first($columns = ['*'])
 * @method static Model|static find($id, $columns = ['*'])
 * @method static Model|static findOrFail($id, $columns = ['*'])
 * @method static Model|static firstOrFail($columns = ['*'])
 * @method static Model|static firstOrNew(array $attributes = [], array $values = [])
 * @method static Model|static create(array $array)
 * @method static Model|static firstOrCreate(array $attributes = [], array $values = [])
 * @method static Model|static updateOrCreate(array $attributes, array $values = [])
 * @method static Builder select(...$columns)
 * @method static Builder selectRaw(string $expression)
 * @method static Builder groupBy(string ...$groups)
 * @method static Builder orderBy(string $column, string $direction = 'ASC')
 * @method static Builder latest($column = null)
 * @method static Builder oldest($column = null)
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder whereHas($relation, Closure $callback = null, $operator = '>=', $count = 1)
 * @method static Builder whereDoesntHave($relation, Closure $callback = null)
 * @method static Builder whereIn ($column, array $values, $boolean = 'and', $not = false)
 * @method static Builder whereNotIn ($column, array $values, $boolean = 'and')
 * @method static Builder orWhereRaw ($sql, $bindings = [])
 * @method static Builder whereRaw ($sql, $bindings = [], $boolean = 'and')
 * @method static Builder withCount(mixed $relations)
 * @method static Builder leftJoin($table, $first, $operator = null, $second = null)
 * @method static Builder rightJoin($table, $first, $operator = null, $second = null)
 * @method static int upsert(array $values, $uniqueBy, $update = null)
 * @method static Builder join($table, $first, $operator = null, $second = null, $type = 'inner', $where = false)
 * @method static LengthAwarePaginator paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
 * @method static Builder inRandomOrder($seed = '')
 * @method static mixed value($column)
 **/
trait ModelTrait
{
    public function getCreatedAtAttribute($value): Carbon|string|null
    {
        return Dates::setTZ($value);
    }

    public function getCreatedAtForHumans()
    {
        if ($created_at = $this->created_at) {
            $created_at = $created_at->diffForHumans();
        }

        return $created_at;
    }
}
