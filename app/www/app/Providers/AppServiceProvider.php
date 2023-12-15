<?php

namespace App\Providers;

use App\Models\MenuItem;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $locale = request()->segment(1) ?: 'en';
        App::setLocale($locale);
        View::composer('partials.header', function ($view) {
            $menuItems = MenuItem::all();
            $order = [1, 18, 51, 33, 40, 44,50];
            $view->with('menuItems', $menuItems)->with('order', $order);
        });
    }
}
