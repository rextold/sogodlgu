<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function business(){
        // $categories = TourismCategory::orderBy('order','asc')->get();
        return view('frontend/transaction/businesspermit',[
            'page' => 'Business Permits',
            'title' =>'Transaction | Business Permits',
        ]);
    }
}
