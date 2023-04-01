<?php

namespace App\Business\Utilities;

class Queries
{
    const TZ = 'Asia/Qatar';
    const UTC = 'UTC';

    public static function convert_tz($column = 'created_at', $to = self::TZ, $from = self::UTC, $alias = false): string
    {
        $from = Dates::properTimezone($from);
        $to = Dates::properTimezone($to);
        return self::setAlias("CONVERT_TZ($column, '$from', '$to')", $alias);
    }

    public static function cast_date($column = 'created_at', $alias = false, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("CAST($column AS DATE)", $alias);
    }

    public static function max_date($column = 'created_at', $alias = false, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("CAST(MAX($column) AS DATE)", $alias);
    }

    public static function min_date($column = 'created_at', $alias = false, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("CAST(MAX($column) AS DATE)", $alias);
    }

    public static function date_sub($interval, $unit, $column = 'created_at', $alias = false, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("DATE_SUB($column, INTERVAL $interval $unit)", $alias);
    }

    public static function date_format($column = 'created_at', $format = '%Y-%m-%d', $alias = null, $to = self::TZ, $from = self::UTC): string
    {
        $column = "DATE_FORMAT(" . self::convert_tz($column, $to, $from) . ", '$format')";
        return self::setAlias("$column", $alias);
    }

    public static function month($column = 'created_at', $alias = null, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("MONTH($column)", $alias);
    }

    public static function year($column = 'created_at', $alias = null, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("YEAR($column)", $alias);
    }

    public static function year_month($column = 'created_at', $alias = null, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("CONCAT(YEAR($column), '-', MONTH($column))", $alias);
    }

    public static function year_quarter($column = 'created_at', $alias = null, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("CONCAT(YEAR($column), '-Q', QUARTER($column))", $alias);
    }

    public static function week($column = 'created_at', $alias = null, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("YEARWEEK($column)", $alias);
    }

    public static function manual_week($column = 'created_at', $alias = null, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("CONCAT(WEEK($column, 0), '-', YEAR($column))", $alias);
    }

    public static function hour($column = 'created_at', $alias = null, $to = self::TZ, $from = self::UTC): string
    {
        $column = self::convert_tz($column, $to, $from);
        return self::setAlias("HOUR($column)", $alias);
    }

    public static function sub_months($interval, $column = 'created_at', $alias = false, $to = self::TZ, $from = self::UTC): string
    {
        return self::setAlias(self::date_sub($interval, 'MONTH', $column, $from, $to), $alias);
    }

    public static function sub_weeks($interval, $column = 'created_at', $alias = false, $to = self::TZ, $from = self::UTC): string
    {
        return self::setAlias(self::date_sub($interval, 'WEEK', $column, $from, $to), $alias);
    }

    public static function sub_years($interval, $column = 'created_at', $alias = false, $to = self::TZ, $from = self::UTC): string
    {
        return self::setAlias(self::date_sub($interval, 'YEAR', $column, $from, $to), $alias);
    }

    public static function sub_days($interval, $column = 'created_at', $alias = false, $to = self::TZ, $from = self::UTC): string
    {
        return self::setAlias(self::date_sub($interval, 'DAY', $column, $from, $to), $alias);
    }

    public static function max($column, $alias = false): string
    {
        return self::setAlias("MAX($column)", $alias);
    }

    public static function min($column, $alias = false): string
    {
        return self::setAlias("MIN($column)", $alias);
    }

    public static function sum($column, $alias = false): string
    {
        return self::setAlias("SUM($column)", $alias);
    }

    public static function count($column, $alias = false): string
    {
        return self::setAlias("COUNT($column)", $alias);
    }

    public static function count_distinct($column, $alias = false): string
    {
        return self::setAlias("COUNT(DISTINCT $column)", $alias);
    }

    public static function json($column, $identifier, $alias = false): string
    {
        return self::setAlias("JSON_UNQUOTE(JSON_EXTRACT($column, '$.$identifier'))", $alias);
    }

    public static function trans($column, $alias = false): string
    {
        return self::setAlias(self::json($column, app()->getLocale()), $alias);
    }

    public static function trans_column($column, $alias = false): string
    {
        return self::setAlias($column . "_" . app()->getLocale(), $alias);
    }

    public static function group_concat($column, $alias = false, $separator = ', ')
    {
        return self::setAlias("GROUP_CONCAT($column SEPARATOR '$separator')", $alias);
    }

    public static function round($column = 'id', $digits = 3, $alias = false)
    {
        return self::setAlias("ROUND($column, $digits)", $alias);
    }

    public static function like($column, $value, $alias = false)
    {
        $value = Strings::abstractString($value);
        return self::setAlias("LOWER(REPLACE($column, ' ', '')) LIKE '%$value%'", $alias);
    }

    public static function last_day($column = 'created_at', $to = self::TZ, $from = self::UTC): string
    {
        return "LAST_DAY(" . self::convert_tz($column, $to, $from) . ")";
    }

    public static function setAlias($query, $alias): string
    {
        if ($alias)
            $query = "$query AS $alias";

        return $query;
    }
}
