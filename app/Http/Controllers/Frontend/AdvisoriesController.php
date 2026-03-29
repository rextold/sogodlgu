<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advisories;
use Faker\Generator;

class AdvisoriesController extends Controller
{
    public function __construct()
    {
       	$page = 'Advisories';
    }

    public function index(Generator $faker)
    {
    	// 	$crud = new Advisories();
		  	// $crud->posted =$faker->lexify('????????');
		  	// $crud->photo = $faker->boolean ? 'no-klase.png': 'nooffice.jpg';
		  	// $crud->title = $faker->lexify('???????? ????????????? ?????????????????');
		  	// $crud->descriptions = $faker->lexify('????????');
		  	// $crud->save();

    	$advisories = Advisories::paginate(5);

        return view('frontend/advisory/index',[
        	'page' => 'Advisories',
        	'title' =>'Advisories | List of Advisories',
        	'breadcrumb' => 'List of Advisories',
        	'advisories' => $advisories
        ]);
    }

    public function show($id = null,$title= null ){
    	var_dump($id);
    	exit();
      //return view('frontend/advisories/index',[
     //    	'page' => 'Advisories',
     //    	'title' =>'Advisories | List of Advisories',
     //    	'breadcrumb' => 'List of Advisories',
     //    	'advisories' => $advisories
     //    ]);
    }
}
