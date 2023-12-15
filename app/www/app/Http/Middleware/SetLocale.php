<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->input('locale', config('app.locale'));

        if ($locale && in_array($locale, config('app.available_locales', []))) {
            // Используем контейнер приложения для установки локали
            app()->setLocale($locale);
        } else {
            // Если локаль не допустима, используем локаль по умолчанию
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
