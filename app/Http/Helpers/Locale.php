<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (!function_exists('is_arabic')) {
    function is_arabic(): bool
    {
        return app()->getLocale() == 'ar';
    }
}

if (!function_exists('is_english')) {
    function is_english(): bool
    {
        return app()->getLocale() == 'en';
    }
}

if (!function_exists('direction')) {
    function direction(): string
    {
        return app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
    }
}

if (!function_exists('proper_locale')) {
    function proper_locale(bool $lower_case = false): string
    {
        $ar = $lower_case ? 'ar' : 'AR';
        $en = $lower_case ? 'en' : 'EN';
        return app()->getLocale() == 'ar' ? $en : $ar;
    }
}

if (!function_exists('target_locale')) {
    function target_locale(): string
    {
        return app()->getLocale() == 'ar' ? 'الإنجليزية' : 'Arabic';
    }
}

if (!function_exists('current_locale_native')) {
    function current_locale_native(): string
    {
        return LaravelLocalization::getCurrentLocaleNative();
    }
}

if (!function_exists('current_locale_flag')) {
    function current_locale_flag(): string
    {
        $flags = ['ar' => 'jordan.svg', 'en' => 'united-states.svg'];
        return $flags[LaravelLocalization::getCurrentLocale()] ?? '';
    }
}

if (!function_exists('locales')) {
    function locales($withCurrent = true): array
    {
        $locales = LaravelLocalization::getSupportedLocales();

        if (!$withCurrent) {
            $locales = array_filter($locales, function ($item) {
                return $item['name'] != LaravelLocalization::getCurrentLocaleName();
            });
        }

        return $locales;
    }
}

if (!function_exists('locale_url')) {
    function locale_url($locale, $url = null): string
    {
        return LaravelLocalization::getLocalizedURL($locale, $url);
    }
}
