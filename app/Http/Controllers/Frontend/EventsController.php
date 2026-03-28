<?php

namespace App\Http\Controllers\frontend;

use App\Event as Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Events::orderBy('created_at')->paginate(2)->jsonSerialize();
    }
    public function indexrndm()
    {
        return Events::inRandomOrder(5)->get()->jsonSerialize();
    }
    public function showForm()
    {
        $events = Events::orderBy('startingdate')->paginate(15);
        return view('frontend/events/index',[
            'page' => 'Events',
            'title' =>'Events | List of Events',
            'breadcrumb' => 'List of Events',
            'events'=> $events,
        ]);
    }
    public function showEvent(Request $request)
    {
       $event = Events::where('id',$request->id)->first();
        return view('frontend/events/showevent',[
            'page' => 'Events',
            'title' =>'Event | '.$event->title,
            'breadcrumb' => $event->title,
            'event'=> $event,
            'thumbnail' => 'images/events/'.$event->photo
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            // $crud = new Events();
            // $crud->photo ='anniv.png';
            // $crud->title = 'Sogod Founding Anniversary Concert';
            // $crud->descriptions = 'secret';
            // $crud->venue = 'Sogod Covered Court';
            // $crud->date = date('04/02/2018');
            // $crud->time = time('h:i:s');

            // $crud->save(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $events = new Events();
            $events->photo = $request->input('photo');
            $events->title = $request->input('title');
            $events->descriptions = $request->input('descriptions');
            $events->venue =  $request->input('venue');
            $events->date = date('04/02/2018');
            $events->time = time('h:i:s');
            $events->save();
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
