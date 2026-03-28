<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismCategory extends Model
{
    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->added_by && \Auth::user()) {
            $this->added_by = \Auth::user()->id;
        }
        parent::save();
    }
    public function spots()
    {
        return $this->belongsTo('App\TouristSpot', 'id', 'tourism_category_id');
    }
}
