<?php

namespace App\Http\Middleware;

use App\Services\LocaleService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        if(
            Str::length($locale = $request->segment(1)) === 2
            && !in_array($locale, LocaleService::getLocalesWithoutDefault()->toArray(), true)
        ){
            return redirect('404');
        }

        if($locale === LocaleService::defaultLocale()){
            $uri = Str::replaceFirst('/'.$locale, '', $request->getRequestUri());
            LocaleService::setLocale($locale);
            return redirect($uri);
        }

        if(is_null($locale) || !in_array($locale, LocaleService::getLocalesWithoutDefault()->toArray(), true)){
            $locale = LocaleService::defaultLocale();
        }

        LocaleService::setLocale($locale);

        return $next($request);
    }
}
