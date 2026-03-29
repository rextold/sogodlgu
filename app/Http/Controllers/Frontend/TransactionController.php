<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function business(){
        $cmsPage = Page::where('slug', 'business-permit')
                        ->where('status', 'ACTIVE')
                        ->first();
        return view('frontend/transaction/businesspermit',[
            'page'     => 'Business Permits',
            'title'    => 'Transaction | Business Permits',
            'cmsPage'  => $cmsPage,
        ]);
    }
}
