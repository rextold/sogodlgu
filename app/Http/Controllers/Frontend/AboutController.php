<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Missionvision;
use App\Sogodhistory;
class AboutController extends Controller
{
    public function __construct()
    {
       
    }

    public function index()
    {
        $history = Sogodhistory::where('status', 1)->first();
        if ($history ) {
            return view('frontend/about/index',[
                'page' => 'About',
                'title' => 'History of Sogod Southern Leyte',
                'history' => $history
            ]);
        }
        
    }
    public function missionvision()
    {
        $mv = Missionvision::where('status', 1)->first(); 
        return view('frontend/about/missionvision',[
            'page' => 'About',
            'title' => 'Sogod Mission and Vision',
            'mv' => $mv
        ]);
    }
}
