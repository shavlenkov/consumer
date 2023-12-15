<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Models\MenuItem;
use App\Models\VideoStories;
use Illuminate\Http\Request;
setlocale(LC_TIME, 'uk_UA.utf8');

class VideoStoriesController extends Controller
{
    public function index()
    {
        $videos = VideoStories::all();
        $menuItemsList = MenuItem::all();
        $tags = $videos->tags()->where('taggable_type', VideoStories::class)->get();

        $order = [1, 18, 51, 33, 40, 44,50];
        $links  = Links::all();
        return view('partials.videos.index', compact( 'videos','menuItemsList','order', 'links', 'tags'));
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
    public function show($id)
    {
        $video = VideoStories::where('id', $id)->firstOrFail();
        $menuItemsList = MenuItem::all();
        $tags = $video->tags()->where('taggable_type', VideoStories::class)->get();
        $order = [1, 18, 51, 33, 40, 44,50];
        $links  = Links::all();
        return view('partials.videos.show', compact('video','menuItemsList','order', 'links', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
