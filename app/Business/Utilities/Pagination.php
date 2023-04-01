<?php

namespace App\Business\Utilities;

class Pagination
{
    // laravel default pagination
    public static function default($model, $perPage = 15, $onEachSide = 1, bool $simple = false)
    {
        $perPage = abs($perPage ?: 15);
        $onEachSide = abs($onEachSide ?: 1);

        if (!method_exists($model, 'paginate') || !is_numeric($perPage) || !is_numeric($onEachSide))
            return null;

        if ($simple) {
            return $model->simplePaginate($perPage)->onEachSide($onEachSide);
        }

        return $model->paginate($perPage)->onEachSide($onEachSide);
    }

    public static function infinite($query, array $options = [])
    {
        // Collect Options
        $options = collect($options);

        // Defaults
        $orderBy = $options->get('order_by', 'id');
        $latest = $options->get('latest', true);
        $page = $options->get('page', 1);
        $resultCount = $options->get('result_count', 25);

        // Get count
        $count = $query->count();

        // Calculate
        $offset = ($page - 1) * $resultCount;
        $endCount = $offset + $resultCount;
        $morePages = $endCount < $count;

        // Ordering
        $latest ? $query->latest($orderBy) : $query->oldest($orderBy);

        // Get all records
        if ($options->get('all', false)) {
            return $query->get()->toArray();
        }

        // Infinite Pagination Response
        return [
            "results" => $query->skip($offset)->take($resultCount)->get(),
            'pagination' => [
                "more" => $morePages
            ]
        ];
    }
}
