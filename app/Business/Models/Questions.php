<?php

namespace App\Business\Models;

use App\Business\States\Question\QuestionState;
use App\Business\Utilities\Arrays;
use App\Business\Utilities\Dates;
use App\Business\Utilities\Queries;
use App\Models\Question;
use App\Models\User;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

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

        if ($branch_id = Arrays::whereNotEmpty($options->get('branch_id'))) {
            if (count($branch_id))
                $query->where('questions.branch_id', $branch_id);
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

    public static function lastFive(): array
    {
        return Question::query()
            ->where('user_id', auth()->id())
            ->get()
            ->toArray();
    }

    public static function lastMonths(int $months = 5, array $options = []): array
    {
        $options = collect($options);
        $query = Question::select([
            DB::raw(Queries::date_format('created_at', '%Y-%b', 'month')),
            DB::raw("SUM(CASE WHEN status = 'open'     THEN 1 ELSE 0 END) AS open"),
            DB::raw("SUM(CASE WHEN status = 'resolved' THEN 1 ELSE 0 END) AS resolved"),
            DB::raw("SUM(CASE WHEN status = 'closed'   THEN 1 ELSE 0 END) AS closed"),
        ])
            ->groupByRaw('month')
            ->orderByRaw('month DESC')
            ->limit($months);

        Dates::filter($query, [
            'date_from' => $options->get('date_from'),
            'date_to' => $options->get('date_to'),
            'column' => $options->get('date_column', 'questions.created_at'),
        ]);

        return $query->get()->toArray();
    }

}
