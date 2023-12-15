<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Events;
use App\Models\Links;
use App\Models\MenuItem;
use App\Models\News;
use App\Models\NewsTranslation;
use App\Models\VideoStories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(5);
        $news = News::paginate(5);
        $events = Events::orderBy('created_at', 'desc')->paginate(5);
        $videos = VideoStories::orderBy('created_at', 'desc')->paginate(5);
        $menuItems = MenuItem::all();
        $links = Links::all();
        $order = [1, 18, 51, 33, 40, 44];
        return view('home', compact( 'news', 'announcements', 'events', 'videos', 'menuItems', 'order', 'links'));
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
    public function show()
    {
        //
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
