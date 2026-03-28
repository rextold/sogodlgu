<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

class TouristSpot extends Model
{
    use Spatial;
    protected $spatial = ['coordinates']; //here is going your field name; should be the point type;

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->added_by && \Auth::user()) {
            $this->added_by = \Auth::user()->id;
        }
        parent::save();
    } 
}
