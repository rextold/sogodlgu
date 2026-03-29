<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TouristSpot;
use App\TourismCategory;

class TourismController extends Controller
{
    public function tourism(){
        $categories = TourismCategory::orderBy('order','asc')->get();

        return view('frontend/tourism/index',[
            'page' => 'Tourism',
            'categories' => $categories,
            'title' =>'Local Tourism',
        ]);
    }
    public function tourist_spot(Request $request){

        $tspot = TouristSpot::where('title', $request->name)->first();

        if (!$tspot) {
            abort(404);
        }

        return view('frontend/tourism/displayone',[
            'page' => $tspot->title,
            'title' =>'Tourism | Sogod Southern Leyte',
            'tspot' => $tspot,
        ]);
    }
}
