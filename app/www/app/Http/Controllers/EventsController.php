<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Links;
use App\Models\MenuItem;
use App\Models\News;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::all();
        $menuItemsList = MenuItem::all();

        $order = [1, 18, 51, 33, 40, 44,50];
        $links  = Links::all();
        return view('partials.events.index', compact( 'events','menuItemsList','order', 'links'));
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
        $event = Events::where('id', $id)->firstOrFail();
        $menuItemsList = MenuItem::all();
        $tags = $event->tags()->where('taggable_type', Events::class)->get();

        $order = [1, 18, 51, 33, 40, 44,50];
        $links  = Links::all();
        return view('partials.events.show', compact('event','menuItemsList','order', 'links', 'tags'));
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
