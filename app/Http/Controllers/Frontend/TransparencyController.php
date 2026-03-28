<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransparencyController extends Controller
{
    public function citizenscharter(){
        return view('frontend/transparency/citizenscharter',[
            'page' => 'Citizens\' Charter',
            'title' =>'Transparency | Citizens\' Charter',
        ]);
    }
}
