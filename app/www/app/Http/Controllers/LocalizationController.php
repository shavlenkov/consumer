<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



class LocalizationController extends Controller
{
    public function changeLanguage($lang)
    {
        // Проверьте, что переданный язык существует в вашем списке доступных языков
        if (in_array($lang, config('app.available_locales'))) {
            App::setLocale($lang);
            session()->put('locale', $lang); // Сохраняем локаль в сессии
        }

        return redirect()->back();
    }
//    public function changeLanguage($lang)
//    {
//        if (array_key_exists($lang, Config::get('languages'))) {
//            Session::put('applocale', $lang);
//        }
//        return Redirect::back();
//    }
//    public function changeLanguageValue(Request $request)
//    {
//        $request->validate([
//            'locale' => 'required|in:en,uk',
//        ]);
//
//        $locale = $request->input('locale');
//
//        if (in_array($locale, ['en', 'uk'])) {
//            App::setLocale($locale);
//        }
//
//        return redirect()->back();
//    }
}
