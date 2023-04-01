<?php

namespace App\Business\Utilities;

use Exception;
use Illuminate\Support\Arr;

class Arrays
{
    public static function pushAtPosition(array $array, $position, $value): array
    {
        // Note: position = index + 1
        $slice = array_slice($array, 0, $position);
        $slice[] = $value;
        return array_merge($slice, array_slice($array, $position));
    }

    public static function lastIndex(array $array, $index)
    {
        return (count($array) - 1) == $index;
    }

    public static function removeByValue(array &$array, $value, $valueType = false)
    {
        // using try/catch to avoid unexpected "array_filter" behaviors
        try {
            return $array = array_filter($array, function($item) use ($value, $valueType) {
                if ($valueType) {
                    settype($item, $valueType);
                    settype($value, $valueType);
                }
                return $item != $value;
            });
        } catch (Exception $exception) {
            $newArray = [];
            foreach ($array as $item) {
                if ($valueType) {
                    settype($item, $valueType);
                    settype($value, $valueType);
                }

                if ($item != $value)
                    $newArray[] = $item;
            }

            return $array = $newArray;
        }
    }

    public static function removeByIndex(array &$array, $index)
    {
        if (key_exists($index, $array))
            array_splice($array, $index, 1);

        return $array;
    }

    /**
     * Check if array is valid and has at least one item.
     * @param $array
     * @return bool
     */
    public static function hasElements($array)
    {
        return !self::hasNoElements($array);
    }

    /**
     * Check if array is not valid
     * @param $array
     * @return bool
     */
    public static function hasNoElements($array)
    {
        return empty($array) || !is_array($array) || sizeof($array) == 0;
    }

    /**
     * The main purpose of this method is to avoid the error of undefined index of array
     * @param $array
     * @param $key
     * @param $default
     * @return mixed|null
     */
    public static function getValueByKey($array, $key, $default = null)
    {
        if (!is_array($array)) {
            return $array ?: $default;
        }

        return array_key_exists($key, $array) ? $array[$key] : $default;
    }

    /**
     * Remove spaces of each array item
     * Recursion Function
     * @param array $array
     * @return array
     */
    public static function trimItems(array &$array): array
    {
        return array_map(function($item) {
            // Array ? Recall The Function
            if (is_array($item))
                return Arrays::trimItems($item);

            if (!is_string($item))
                return $item;

            return Strings::trimSpace($item);
        }, $array);
    }

    /**
     * Remove spaces from the edges of each array item
     * Recursion Function
     * @param array $array
     * @return array
     */
    public static function trimItemsEdges(array &$array): array
    {
        return array_map(function($item) {
            // Array ? Recall The Function
            if (is_array($item))
                return Arrays::trimItemsEdges($item);

            if (!is_string($item))
                return $item;

            return Strings::trimEdgesSpace($item);
        }, $array);
    }

    /**
     * Convert the string values to upper case
     * @param array $array
     * @return array
     */
    public static function upperCaseItems(array &$array = []): array
    {
        return array_map(function($item) {
            if (is_string($item)) {
                $item = strtoupper($item);
            }

            return $item;
        }, $array);
    }

    /**
     * Sort multidimensional array by specific column
     * @param $array
     * @param $column
     * @return array
     */
    public static function sortMultiDimensional(&$array, $column)
    {
        if (sizeof($array) > 0) {
            // Columns to be sort by
            $columns = array_column($array, $column);

            if (sizeof($columns) > 0)
                array_multisort($columns, SORT_ASC, $array);
        }

        return $array;
    }

    /**
     * Remove empty items from array
     * @param $array
     * @return array
     */
    public static function whereNotEmpty($array): array
    {
        return Arr::where(Arr::wrap($array), function ($item) {
            return !empty($item);
        });
    }
}
