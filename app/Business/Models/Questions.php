<?php

namespace App\Business\Models;

use App\Business\States\Question\QuestionState;
use App\Business\Utilities\Dates;
use App\Business\Utilities\Queries;
use App\Models\Question;
use App\Models\User;
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

        if ($user_id = $options->get('user_id')) {
            $query->where('questions.user_id', $user_id);
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

    public static function logStatus(Question $question, QuestionState|string $old_status, ?User $user = null, ?string $reason = null): void
    {
        activity('question_status')
            ->performedOn($question)
            ->causedBy($user ?: auth()->user())
            ->withProperties(['old_status' => $old_status, 'new_status' => $question->status])
            ->log($reason ?: 'Question status updated');
    }
}
