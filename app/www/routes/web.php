<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\VideoStoriesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagsController;
\App\Services\LocaleService::routes(static function () {

    // Все маршруты указывать внутри этой группы
    Route::group(['middleware' => ['locale']], static function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::controller(VideoStoriesController::class)
            ->name('videos.')
            ->prefix('videos')->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show');
            });

        Route::controller(EventsController::class)
            ->name('events.')
            ->prefix('events')->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show');
            });

        Route::controller(PagesController::class)
            ->name('pages.')
            ->prefix('page')->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show');
            });


        Route::controller(NewsController::class, 'news')
            ->name('news.')
            ->prefix('news')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{slug}', 'show')->name('show');
            });

        Route::get('/search-results',[SearchController::class, 'search'])->name('search.by.tags');

        Route::prefix('announcements')->name('announcements.')->group(function () {
            Route::get('/', [AnnouncementController::class, 'index'])->name('index');
            Route::get('/{id}', [AnnouncementController::class,'show'])->name('show');
        });
        Route::get('/posts-by-tag/{slug}', [TagsController::class, 'postsByTag'])->name('posts.by.tag');

    });

});

// Переключение языка, но только перенаправление на главную страницу версии языка. Можно перенести в отдельный контроллер
Route::post('change-language', static function (\Illuminate\Http\Request $request) {
    if ($request->has('locale') && in_array($request->get('locale'), \App\Services\LocaleService::getLocales()->toArray())) {
        app()->setLocale($request->get('locale'));
        return redirect($request->get('locale'));
    }

    return redirect()->back();
})->name('change.language');

////Route::get('change-language/{locale}', [LocalizationController::class,'changeLanguage'])
////    ->name('changeLanguage');

//Route::get('/search-results',[SearchController::class, 'search'])->name('search.by.tags');

////Route::post('/change-language', [LocalizationController::class,'changeLanguageValue'])->name('change.language');
////Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LocalizationController@changeLanguage']);

//Route::get('change-locale/{locale}', function(Request $request){
//    app()->setLocale($request->route()->getParameter('locale'));
//})->whereIn('locale', ['uk', 'en'])->name('changeLanguage');
//Route::controller(NewsController::class)->name('news.')->prefix('news')->group(function () {
//    Route::get('/', 'index')->name('index');
//    Route::get('/{id}', 'show')->name('show');
//})->whereIn('locale', ['uk']);
////Route::prefix('{locale?}')
////    ->middleware('localize')
////    ->group(function() {
////        Route::get('/', [HomeController::class, 'index']);
////        Route::controller(NewsController::class)
////    ->name('news.')
////    ->prefix('news')->group(function () {
////
////        Route::get('/', 'index')->name('index');
////        Route::get('/{id}', 'show')->name('show');
////});
////        Route::prefix('announcements')->name('announcements.')->group(function () {
////            Route::get('/', [AnnouncementController::class, 'index'])->name('index');
////            Route::get('/{id}', [AnnouncementController::class,'show'])->name('show');
////        });
////    });
///
//Route::group(['prefix' => '{locale?}', 'middleware' => 'localize'], function() {
//    Route::get('/', [HomeController::class, 'index']);
//
////
////        Route::prefix('news')->name('news.')->group(function () {
////            Route::get('/', [NewsController::class,'index'])->name('index');
////            Route::get('/{id}', [NewsController::class,'show'])->name('show');
////        });
//
//        Route::prefix('announcements')->name('announcements.')->group(function () {
//            Route::get('/', [AnnouncementController::class, 'index'])->name('index');
//            Route::get('/{id}', [AnnouncementController::class,'show'])->name('show');
//        });
//});
