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
        // Admin sets the correct eBPLS URL in Voyager: Pages > slug "ebpls-link" > Body field
        $ebplsUrl = Page::where('slug', 'ebpls-link')
                        ->where('status', 'ACTIVE')
                        ->value('body');
        return view('frontend/transaction/businesspermit',[
            'page'     => 'Business Permits',
            'title'    => 'Transaction | Business Permits',
            'cmsPage'  => $cmsPage,
            'ebplsUrl' => $ebplsUrl ? trim(strip_tags($ebplsUrl)) : null,
        ]);
    }
}
