<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resolution;

class Resolution extends Model
{
    //
    public static function mostviewed(){
    	$reso = Resolution::OrderBy('views','desc')
    			->paginate(5);
    	return $reso;
    }

}
