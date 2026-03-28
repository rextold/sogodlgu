<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FdpReport;
use Illuminate\Support\Str;

class FdpReportController extends Controller
{
    public function index(Request $request)
    {
        $query = FdpReport::query();
    
        // Filter by search term
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
    
        // Filter by year
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }
    
        // Filter by quarter
        if ($request->filled('quarter')) {
            $query->where('quarter', $request->quarter);
        }
    
        $reports = $query->orderBy('created_at', 'desc')->paginate(10);
    
        // Get all available years for the dropdown
        $years = FdpReport::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
    
        return view('frontend/transparency/fdp/index', [
            'page' => 'Full Disclosure Policy Reports',
            'title' => 'Transparency | FDP Reports',
            'reports' => $reports,
            'years' => $years,
        ]);
    }
}
