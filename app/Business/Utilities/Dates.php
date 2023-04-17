<?php

namespace App\Business\Utilities;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Log;

class Dates
{
    public static function filter(QueryBuilder|Builder &$query, array $options = [])
    {
        $options = collect($options);

        $column = $options->get('column', 'created_at');
        $column = $column ?: 'created_at';

        if ($exact_date = $options->get('exact_date', false)) {
            $exact_date = Carbon::parse($exact_date)->format('Y-m-d');
            $query = $query->whereRaw(Queries::date_format($column) . " = '$exact_date'");
        }

        if ($date_from = $options->get('date_from', false)) {
            $date_from = Carbon::parse($date_from)->startOfDay();
            $query = $query->whereRaw(Queries::convert_tz($column) . " >= '$date_from'");
        }

        if ($date_to = $options->get('date_to', false)) {
            $date_to = Carbon::parse($date_to)->endOfDay();
            $query = $query->whereRaw(Queries::convert_tz($column) . " <= '$date_to'");
        }

        if ($month_from = $options->get('month_from', false)) {
            $month_from = Carbon::make($month_from)->endOfMonth()->format('Y-m-d');
            $query = $query->whereRaw(Queries::last_day($column) . " >= '$month_from'");
        }

        if ($month_to = $options->get('month_to', false)) {
            $month_to = Carbon::make($month_to)->endOfMonth()->format('Y-m-d');
            $query = $query->whereRaw(Queries::last_day($column) . " <= '$month_to'");
        }

        return $query;
    }

    public static function setTZ($value, $timezone = 'Asia/Qatar')
    {
        $date = null;
        try {
            $date = Carbon::parse($value)->timezone(self::properTimezone($timezone));
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }

        return $date;
    }

    public static function properTimezone($timezone)
    {
//        $localEnvironment = app()->environment('local');
//
//        return match (strtolower($timezone)) {
//            "+00:00", "utc" => $localEnvironment ? '+00:00' : 'UTC',
//            "+03:00", "asia/amman", "asia/qatar" => $localEnvironment ? '+03:00' : 'Asia/Qatar',
//            default => null,
//        };

        return match (strtolower($timezone)) {
            "+00:00", "utc" => '+00:00',
            "+03:00", "asia/amman", "asia/qatar" => '+03:00',
            default => null,
        };
    }

    public static function parse($date): ?Carbon
    {
        if (empty($date)) {
            return null;
        }

        try {
            return Carbon::parse($date);
        } catch (Exception $exception) {
            return null;
        }
    }
}
