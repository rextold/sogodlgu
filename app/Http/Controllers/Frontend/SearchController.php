<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Ordinance;
use App\Resolution;
use App\Event;
use App\TouristSpot;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->input('q', ''));

        if (strlen($query) < 2) {
            return view('frontend.search.results', [
                'query'      => $query,
                'posts'      => collect(),
                'ordinances' => collect(),
                'resolutions'=> collect(),
                'events'     => collect(),
                'spots'      => collect(),
                'total'      => 0,
                'title'      => 'Search — Sogod LGU',
            ]);
        }

        $like = "%{$query}%";

        $posts = Post::with('category')
            ->where('status', 'PUBLISHED')
            ->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)
                  ->orWhere('excerpt', 'like', $like);
            })
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        $ordinances = Ordinance::where('title', 'like', $like)
            ->orWhere('description', 'like', $like)
            ->orderBy('date', 'desc')
            ->limit(6)
            ->get();

        $resolutions = Resolution::where('title', 'like', $like)
            ->orWhere('body', 'like', $like)
            ->orderBy('date', 'desc')
            ->limit(6)
            ->get();

        $events = Event::where('title', 'like', $like)
            ->orWhere('body', 'like', $like)
            ->orderBy('event_date', 'desc')
            ->limit(6)
            ->get();

        $spots = TouristSpot::where('title', 'like', $like)
            ->orWhere('body', 'like', $like)
            ->limit(6)
            ->get();

        $total = $posts->count() + $ordinances->count() + $resolutions->count()
               + $events->count() + $spots->count();

        return view('frontend.search.results', [
            'query'       => $query,
            'posts'       => $posts,
            'ordinances'  => $ordinances,
            'resolutions' => $resolutions,
            'events'      => $events,
            'spots'       => $spots,
            'total'       => $total,
            'title'       => 'Search: "' . $query . '" — Sogod LGU',
        ]);
    }
}
