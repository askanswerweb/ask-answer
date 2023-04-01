<?php

namespace App\Business;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Localizations
{
    public static function routeGroup(): array
    {
        return [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
        ];
    }
}
