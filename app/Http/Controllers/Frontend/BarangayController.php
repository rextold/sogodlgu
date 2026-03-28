<?php

namespace App\Http\Controllers\Frontend;

use App\BarangayOfficial as Barangayofficials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barangay;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function barangay(Request $request)
    {
        $barangayofficials = Barangayofficials::orderBy('order', 'asc')
                            ->with('barangay')
                            ->with('position')
                            ->get();
        $barangays = Barangay::orderBy('order', 'asc')
                            ->get();
        return view('frontend/barangay/index',[
            'page' => 'Barangays',
            'barangays' =>  $barangays,
            'barangayofficials' => $barangayofficials,
            'title' =>'Barangay officials | Sogod Southern Leyte',
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
