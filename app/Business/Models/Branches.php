<?php

namespace App\Business\Models;

use App\Business\Utilities\Dates;
use App\Business\Utilities\Queries;
use App\Models\Branch;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Branches
{
    public static function filter(QueryBuilder|Builder $query, array $options = []): QueryBuilder|Builder
    {
        $options = collect($options);

        if ($search = $options->get('search')) {
            $query->where(function ($query) use ($search) {
                $query->where('branches.id', $search);
                $query->orWhereRaw(Queries::like('branches.name', $search));
            });
        }

        if ($id = $options->get('id')) {
            $query->where('branches.id', $id);
        }

        if ($name = $options->get('name')) {
            $query->whereRaw(Queries::like('branches.name', $name));
        }

        Dates::filter($query, [
            'date_from' => $options->get('date_from'),
            'date_to' => $options->get('date_to'),
            'column' => $options->get('date_column', 'branches.created_at'),
        ]);

        return $query;
    }

    public static function topBranches(int $take = 3, array $options = [])
    {
        $options = collect($options);
        $query = Branch::query()
            ->select([
                'branches.id',
                'branches.name',
                DB::raw(Queries::count_distinct('users.id', 'users'))
            ])
            ->join('branch_user', 'branch_user.branch_id', 'branches.id')
            ->join('users', 'users.id', 'branch_user.user_id')
            ->groupByRaw('id')
            ->orderByRaw('users DESC')
            ->take($take > 0 ? $take : 3);

        Dates::filter($query, [
            'date_from' => $options->get('date_from'),
            'date_to' => $options->get('date_to'),
            'column' => $options->get('date_column', 'branches.created_at'),
        ]);

        return $query->get()->toArray();
    }
}
