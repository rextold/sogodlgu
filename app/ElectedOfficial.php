<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectedOfficial extends Model
{
    public function position()
    {
        return $this->belongsTo('App\Position', 'position_id');
    }
    public function official()
    {
        return $this->belongsTo('App\Official', 'officials_id');
    }
    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->addedby && \Auth::user()) {
            $this->addedby = \Auth::user()->id;
        }
        parent::save();
    }
}
