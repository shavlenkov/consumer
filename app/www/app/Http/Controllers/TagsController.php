<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Events;
use App\Models\News;
use App\Models\Tag;
use App\Models\VideoStories;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function postsByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $news = $tag->news()->orderBy('created_at', 'desc');
        $videos = $tag->videos()->orderBy('created_at', 'desc')->get();
        $events = $tag->events()->orderBy('created_at', 'desc')->paginate(10);
        $announcements = $tag->announcements()->orderBy('created_at', 'desc')->paginate(10);
        // Додайте інші запити для інших типів постів

        // Повернути вид і передати дані в нього
        return view('partials.tags.posts-by-tag', compact('tag', 'news', 'videos', 'events', 'announcements'));
    }
}
