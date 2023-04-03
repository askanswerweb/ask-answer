<?php

namespace App\Business\Models;

use App\Business\Utilities\Dates;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class Answers
{
    public static function filter(QueryBuilder|Builder $query, array $options = []): QueryBuilder|Builder
    {
        $options = collect($options);

        if ($user_id = $options->get('user_id')) {
            $query->where('answers.user_id', $user_id);
        }

        if ($question_id = $options->get('question_id')) {
            $query->where('answers.question_id', $question_id);
        }

        Dates::filter($query, [
            'date_from' => $options->get('date_from'),
            'date_to' => $options->get('date_to'),
            'column' => $options->get('date_column', 'answers.created_at'),
        ]);

        return $query;
    }
}
