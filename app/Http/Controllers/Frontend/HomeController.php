<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featactivities = Post::Where('category_id',7)
                                ->Where('featured',true)
                                ->paginate(4);
        $featnews = Post::Where('category_id',6)
                                ->Where('featured',true)
                                ->paginate(4);

        return view('frontend/home/index',[
        	'page' => 'Home',
            'featnews' => $featnews,
            'featactivities' => $featactivities,
        	'title' =>'Welcome to Sogod Southern Leyte',
        ]);
    }

}
