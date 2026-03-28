<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feat = Post::with('category')->where('category_id','!=',1)->inRandomOrder()->first();
        $news = Post::orderBy('created_at','asc')->with('category')->inRandomOrder()->get();
        if (count($news) > 3) {
            $count = count($news)/3;
        }else{
            $count = 1;
        }
        
        return view('frontend/news/index',[
            'page' => 'News',
            'feat' => $feat,
            'news' =>  $news,
            'rowCount' => $count,
            'title' =>'News | Sogod Southern Leyte',
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showC19Updates()
    {
        return view('frontend/COVID-19/index',[
            'page' => 'News',
            'title' => 'Covid-19 Updates',
            'breadcrumb' => 'Covid-19 Updates',
        ]);
    } 
    public function showArticle(Request $request)
    {
        $article = News::where('id',$request->id)->first();
        $tags =explode(',',$article->tags);
        return view('frontend/news/showarticle',[
            'page' => 'News',
            'title' => $article->title.'| News',
            'breadcrumb' => $article->title,
            'article'=> $article,
            'tags' => $tags,
            'thumbnail' => 'images/news/'.$article->photo
        ]);
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
