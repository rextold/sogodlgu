<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advisory;

class AdvisoriesController extends Controller
{
    public function index()
    {
        $advisories = Advisory::orderBy('created_at', 'desc')->paginate(10);

        return view('frontend/advisory/index', [
            'page'       => 'Advisories',
            'title'      => 'Advisories | Municipal Government of Sogod',
            'breadcrumb' => 'List of Advisories',
            'advisories' => $advisories,
        ]);
    }

    public function show($id = null, $title = null)
    {
        $advisory = Advisory::findOrFail($id);

        // Increment hits
        $advisory->increment('hits');

        $recent = Advisory::orderBy('created_at', 'desc')->where('id', '!=', $id)->take(5)->get();

        return view('frontend/advisory/show', [
            'page'     => 'Advisories',
            'title'    => $advisory->title . ' | Advisories',
            'advisory' => $advisory,
            'recent'   => $recent,
        ]);
    }
}

