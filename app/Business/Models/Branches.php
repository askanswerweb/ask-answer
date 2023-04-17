<?php

namespace App\Business\Models;

use App\Business\Utilities\Dates;
use App\Business\Utilities\Queries;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class Branches
{
    public static function filter(QueryBuilder|Builder $query, array $options = []): QueryBuilder|Builder
    {
        $options = collect($options);

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
}
