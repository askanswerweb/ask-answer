<?php

namespace App\Business\Models;

use App\Business\Utilities\Dates;
use App\Business\Utilities\Queries;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class Questions
{
    public static function filter(QueryBuilder|Builder $query, array $options = []): QueryBuilder|Builder
    {
        $options = collect($options);

        if ($id = $options->get('id')) {
            $query->where('questions.id', $id);
        }

        if ($status = $options->get('status')) {
            $query->where('questions.status', $status);
        }

        if ($title = $options->get('title')) {
            $query->whereRaw(Queries::like('questions.title', $title));
        }

        Dates::filter($query, [
            'date_from' => $options->get('date_from'),
            'date_to' => $options->get('date_to'),
            'column' => $options->get('date_column', 'questions.created_at'),
        ]);

        return $query;
    }
}
