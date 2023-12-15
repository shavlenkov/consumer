<?php
namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class LocaleService extends Route
{

    public static function routes(\Closure $closure) : void
    {
        static::getLocales()->each(fn($local)=>static::prefix($local)->middleware('locale')->group($closure));
    }

    public static function getLocales() : Collection
    {
        return collect(config('moonshine.locales'))->push('');
    }

    public static function getLocalesWithoutDefault() : Collection
    {
        return collect(config('moonshine.locales'))->except(static::defaultLocale())->push('');
    }

    public static function defaultLocale() : string
    {
        return 'uk';
    }

    public static function setLocale(string $locale) : void
    {
        if(!Str::length($locale) || !in_array($locale, static::getLocales()->toArray(), true)) {
            self::$app->setLocale(static::defaultLocale());
            return;
        }
        self::$app->setLocale($locale);
    }

}
