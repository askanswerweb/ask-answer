<?php

namespace App\Business\Utilities;

use Exception;
use Illuminate\Support\Facades\Log;

class Strings
{
    public static function abstractString($string, bool $withLower = true): string
    {
        self::trimEdgesSpace($string);

        if ($withLower) {
            $string = strtolower($string);
        }

        try {
            $string = preg_replace('/\s+/', '', $string);
        } catch (Exception $exception) {
            $string = str_replace('', '', $string);
            Log::error($exception->getMessage());
        }

        return addslashes($string);
    }

    public static function fileName($name = 'download', $extension = 'xlsx'): string
    {
        $name = $name ?: 'download';
        $name = str_replace(['\\', '/'], '-', $name);

        return "$name.$extension";
    }

    /**
     * Remove spaces from string
     * @param $string
     * @return string
     */
    public static function trimSpace($string): string
    {
        return str_replace(' ', '', $string);
    }

    /**
     * Remove spaces from the start and end of string
     * @param $string
     * @return string
     */
    public static function trimEdgesSpace(&$string): string
    {
        if (str_starts_with($string, ' ')) {
            $string = ltrim($string);
        }

        if (str_ends_with($string, ' ')) {
            $string = rtrim($string);
        }

        return $string;
    }

    public static function firstLetter($string): string
    {
        if (!is_string($string)) {
            return '';
        }

        return mb_substr($string, 0, 1, 'utf8');
    }

    public static function firstWord($string): string
    {
        return strtok($string, " ");
    }
}
