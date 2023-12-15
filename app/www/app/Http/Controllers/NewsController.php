<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Models\MenuItem;
use App\Models\News;
use App\Models\NewsTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        $menuItemsList = MenuItem::all();

        $order = [1, 18, 51, 33, 40, 44,50];
        $links  = Links::all();
        return view('partials.news.index', compact('news', 'menuItemsList','order', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $locale = App::getLocale();
        $menuItemsList = MenuItem::all();
        $news = News::where('slug->'.$locale, $slug)->firstOrFail();
        $tags = $news->tags()->where('taggable_type', News::class)->get();

        $order = [1, 18, 51, 33, 40, 44,50];
        $links  = Links::all();

        return view('partials.news.show', compact('news',  'order', 'menuItemsList', 'links', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
