<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class ChangeLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $locale = strpos($request->getHttpHost(), 'uk') === 0 ? 'uk' : 'en';

        // Додати локаль до URL
        $request->attributes->add(['locale' => $locale]);

        App::setLocale($locale);

        return $next($request);
    }
}
