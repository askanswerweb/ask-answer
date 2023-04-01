<?php

namespace App\Business\Utilities;

use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class Models
{
    public static function getStateHtml($title, $variant, bool $as_badge = false)
    {
        $data = ['title' => $title, 'variant' => $variant];
        if ($as_badge) {
            return view('components.state-view-badge', $data)->render();
        }

        return view('components.state-view', $data)->render();
    }

    public static function exclude(QueryBuilder|Builder &$query, $exclude, $column = 'id'): void
    {
        if (sizeof($exclude = Arrays::whereNotEmpty($exclude)) == 0) {
            return;
        }

        $query->whereNotIn($column, $exclude);
    }
}
