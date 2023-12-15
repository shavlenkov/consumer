<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementTranslation;
use App\Models\Links;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function index()
    {
        $announcements = Announcement::all();
        $menuItemsList = MenuItem::all();

        $order = [1, 18, 51, 33, 40, 44,50];
        $links  = Links::all();
        return view('partials.announcements.index', compact( 'announcements','menuItemsList','order', 'links'));
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
        $announcement = Announcement::where('id', $id)->firstOrFail();
        $menuItemsList = MenuItem::all();
        $tags = $announcement->tags()->where('taggable_type', Announcement::class)->get();

        $order = [1, 18, 51, 33, 40, 44,50];
        $links  = Links::all();

        return view('partials.announcements.show', compact('announcement', 'menuItemsList','order', 'links', 'tags'));
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
    }}
