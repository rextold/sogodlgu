<?php

namespace App\Http\Controllers\Frontend;

use App\Announcements;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAnnouncement(Request $request)
    {
        $announcement = Announcements::where('id',$request->id)->first();
        $tags =explode(',',$announcement->tags);
        return view('frontend/announcements/showannouncement',[
            'page' => 'Announcement',
            'title' => $announcement->title.' | Announcements',
            'breadcrumb' => $announcement->title,
            'announcement'=> $announcement,
            'tags' => $tags,
            'thumbnail' => 'images/announcements/'.$announcement->photo
        ]);
    }

    public function index()
    {
        return Announcements::inRandomOrder(10)->get()->jsonSerialize();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showArticle(Request $request)
    {

        $announcement = Post::where('id',$request->id)->with("category")->with('author')->first();
        if($announcement){
            $previous = Post::where('id', '<', $announcement->id)->min('id');
            $next = Post::where('id', '>', $announcement->id)->max('id');        
        
            return view('frontend.announcements.showannouncement',[
                'page' => $request->category,
                'title' => $announcement->title,
                'breadcrumb' => $announcement->title,
                'announcement'=> $announcement,
                'thumbnail' => $announcement->image,
            ])->with('previous', $previous)->with('next', $next);
        }else {
            return view('errors/404',[
                'page' => $request->category,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
