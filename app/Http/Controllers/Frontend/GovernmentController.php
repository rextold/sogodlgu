<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barangay;
use App\Offices;
use App\ElectedOfficial;
use App\Official;
use App\SbMember;
use App\Mayorsmessage;
use App\Offices_p;
use App\Keyofficials;
use App\Ordinance;
use App\Resolution;
use App\Page;
use Carbon\Carbon;
use Faker\Generator;
use App\Category;

class GovernmentController extends Controller
{
	public function __construct()
    {
       	$page = 'Government';
    }

    public function keyofficials()
    {
        $mayor = Keyofficials::where('position','MAYOR')->first();
        $vicemayor = Keyofficials::where('position','VICE-MAYOR')->first();
        $keyofficials = Keyofficials::orderBy('id')->where('position','!=','MAYOR')->where('position','!=','VICE-MAYOR')->get();
        return view('frontend/government/keyofficials',[
        	'page' => 'Government',
        	'title' =>'Government | Key officials',
        	'breadcrumb' => 'Key Officials',
            'mayor'=> $mayor,
            'vicemayor'=> $vicemayor,
            'keyofficials'=> $keyofficials,
        ]);
    }
    public function offices()
    {
        $offices = Offices::orderBy('office')->paginate(20);
        $updated_at = Offices::orderBy('updated_at')->first();
        return view('frontend/government/offices',[
        	'page' => 'Government',
        	'title' =>'Government | Offices',
        	'breadcrumb' => 'Offices',
            'offices' => $offices,
            'updated_at' => $updated_at,
        ]);
    }
    public function offices_p(Request $request)
    {
        $offices_p = Offices_p::where('offices_id',$request->id)->paginate(20);
        $updated_at = Offices_p::where('offices_id',$request->id)->orderBy('updated_at')->first();

        return view('frontend/government/_showpersonnel',[
            'page' => 'Government',
            'title' =>'Government | '.$request->office,
            'breadcrumb' => $request->office,
            'offices_p' => $offices_p,
            'updated_at' => $updated_at,
        ]);
    }
    public function barangay()
    {
        $barangays = Barangay::orderBy('name')->paginate(20);
        $updated_at = Barangay::orderBy('updated_at')->first();

        return view('frontend/government/barangay',[
        	'page' => 'Government',
        	'title' =>'Government | Barangay',
        	'breadcrumb' => 'Barangay',
            'barangays' => $barangays,
        	'updated_at' => $updated_at,
        ]);
    }
    public function showbarangay(Request $request)
    {
        $barangay = Barangay::where('id',$request->id)->first();
        return view('frontend/government/_showbarangay',[
            'page' => 'Government',
            'title' =>'Barangay | '.$barangay->name,
            'breadcrumb' => $barangay->name,
            'barangay' => $barangay,
        ]);
    }

    public function listbarangay(Request $request)
    {
        return Barangay::get();;
    }

    public function mmsg(){
        return Mayorsmessage::where('status',true)->first();
    }
    // public function resolutions(){
    //     return view('frontend/government/legislative/resolutions',[
    //         'page' => 'resolutions',
    //         'title' =>'Legislative|  Resolutions',
    //     ]);
    // }
    public function ordinances(){
        
        $by_date = Ordinance::OrderBy('date','desc')->get()->groupBy(function($date) {
            return Carbon::parse($date->date)->format('M Y');
        }); 

        // $ordinances = Ordinance::whereMonth('date', date('m',strtotime(Carbon::now())))
        //       ->whereYear('date', date('Y' , strtotime(Carbon::now())))
        //       ->get();
        $ordinances = Ordinance::all();
               // dd($ordinances);

        return view('frontend/government/legislative/ordinances',[
            'page' => 'ordinances',
            'pageHeading' => 'Ordinances',
            'ordinances' => $ordinances,
            'by_date' => $by_date,
            'title' =>'Legislative | Ordinances',
        ]);
    }
    public function getordinances(Request $request){

        $by_date = Ordinance::OrderBy('date','desc')->get()->groupBy(function($date) {
            return Carbon::parse($date->date)->format('M Y');
        }); 

        $ordinances = Ordinance::whereMonth('date',date('m',strtotime($request->month)))
                ->whereYear('date', $request->year)
                ->get();

        // dd($ordinances);
        return view('frontend/government/legislative/ordinances',[
            'page' => 'ordinances',
            'ordinances' => $ordinances,
            'pageHeading' => 'Ordinances',
            'by_date' => $by_date,
            'title' =>'Legislative | Ordinances',
        ]);
    }
    public function show_ordinance(Request $request){

        $ordinance = Ordinance::where('id', $request->id)
                ->first();
        $ordinance->increment('views');
        $ordinance->file =(json_decode($ordinance->file))[0]->download_link;
        return view('frontend/government/legislative/_showordinance',[
            'page' => 'ordinances',
            'ordinance' => $ordinance,
            'pageHeading' => $request->title,
            'title' =>'Legislative | Ordinances | '.$request->title,
        ]);
    }
    public function getresolutions(Request $request){
        $by_date = Resolution::OrderBy('date','desc')->get()->groupBy(function($date) {
            return Carbon::parse($date->date)->format('M Y');
        });

        $resolutions = Resolution::whereMonth('date',date('m',strtotime($request->month)))
                ->whereYear('date', $request->year)
                ->get();

        // dd($ordinances);
        return view('frontend/government/legislative/resolutions',[
            'page' => 'resolutions',
            'resolutions' => $resolutions,
            'pageHeading' => 'Resolutions',
            'by_date' => $by_date,
            'title' =>'Legislative | Resolutions',
        ]);
    }
    public function show_resolution(Request $request){

        $resolution = Resolution::where('id', $request->id)
                ->first();
        $resolution->increment('views');
        $resolution->file =(json_decode($resolution->file))[0]->download_link;
        return view('frontend/government/legislative/_showresolution',[
            'page' => 'resolutions',
            'resolution' => $resolution,
            'pageHeading' => $request->title,
            'title' =>'Legislative | Resolution | '.$request->title,
        ]);
    }
    public function resolutions(){
        
        $by_date = Resolution::OrderBy('date','desc')->get()->groupBy(function($date) {
            return Carbon::parse($date->date)->format('M Y');
        });

        // $resolutions = Resolution::whereMonth('date', date('m',strtotime(Carbon::now())))
        //       ->whereYear('date', date('Y' , strtotime(Carbon::now())))
        //       ->get();
        $resolutions = Resolution::all();

        return view('frontend/government/legislative/resolutions',[
            'page' => 'resolutions',
            'pageHeading' => 'Resolutions',
            'resolutions' => $resolutions,
            'by_date' => $by_date,
            'title' =>'Legislative | Resolutions',
        ]);
    }
    public function legislative_officials(){

        $sbmembers = SbMember::orderBy('order','asc')->with('position')->with('official')->where('status', 1)->get();
        if (count($sbmembers) > 4) {
            $count = count($sbmembers)/4;
        }else{
            $count = 1;
        }
        $sessionPage = \App\Page::where('slug','sb-session-info')->where('status','ACTIVE')->first();
        
        return view('frontend/government/legislative/officials',[
            'title' =>'Government | Legislative officials',
            'sbmembers' =>  $sbmembers,
            'rowCount' => $count,
            'page' => 'Sangguniang Bayan Officials',
            'sessionPage' => $sessionPage,
        ]);
    }
    public function elected_officials(){

        $elected = ElectedOfficial::orderBy('order','asc')->with('position')->with('official')->where('status', 1)->get();
        if (count($elected) > 4) {
            $count = count($elected)/4;
        }else{
            $count = 1;
        }

        return view('frontend/government/legislative/officials',[
            'title' =>'Government | Elected officials',
            'sbmembers' =>  $elected,
            'rowCount' => $count,
            'page' => 'Elected officials'
        ]);
    }
}