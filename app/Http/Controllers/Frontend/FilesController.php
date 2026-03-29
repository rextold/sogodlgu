<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\File;
use App\Filecategory;

class FilesController extends Controller
{
    public function index()
    {
        // All active categories with their published files
        $categories = Filecategory::orderBy('name')->get()->map(function ($cat) {
            $cat->files = File::where('file_category', $cat->id)
                              ->where('ispublished', 1)
                              ->orderBy('title')
                              ->get();
            return $cat;
        })->filter(function ($cat) {
            return $cat->files->isNotEmpty();
        });

        // Published files with no valid category (orphans)
        $categoryIds = Filecategory::pluck('id')->toArray();
        $uncategorized = File::where('ispublished', 1)
                             ->whereNotIn('file_category', $categoryIds)
                             ->orderBy('title')
                             ->get();

        return view('frontend.transaction.files', [
            'page'          => 'Files & Documents',
            'title'         => 'Downloads | Files & Documents',
            'categories'    => $categories,
            'uncategorized' => $uncategorized,
        ]);
    }
}
