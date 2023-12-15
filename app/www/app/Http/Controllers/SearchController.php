<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Events;
use App\Models\News;
use App\Models\NewsTranslation;
use App\Models\VideoStories;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Отримати параметри пошуку з запиту
        $searchTerm = $request->input('search');

        $results = [
            'news' => News::where('title', 'like', "%$searchTerm%")->orWhere('content', 'like', "%$searchTerm%")->get(),
            'events' => Events::where('title', 'like', "%$searchTerm%")->orWhere('content', 'like', "%$searchTerm%")->get(),
            'video' => VideoStories::where('title', 'like', "%$searchTerm%")->orWhere('content', 'like', "%$searchTerm%")->get(),
            'announcement' => Announcement::where('title', 'like', "%$searchTerm%")->orWhere('content', 'like', "%$searchTerm%")->get(),
        ];

        return view('partials.search-results', compact('results'));
    }
}
