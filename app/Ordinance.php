<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Ordinance;

class Ordinance extends Model
{
    // public static function creating(User $user){
    // 	$user->created_by = auth()->user() ? auth()->user()->name : null;
    // }
    public static function mostviewed(){
    	$ord = Ordinance::OrderBy('views','desc')
    			->paginate(5);
    	return $ord;
    }
}
