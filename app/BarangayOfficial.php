<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangayOfficial extends Model
{
    public function barangay()
    {
        return $this->belongsTo('App\Barangay', 'barangay_id');
    }
    public function position()
    {
        return $this->belongsTo('App\Position', 'position_id');
    }
    public function save(array $options = [])
    {
        if (!$this->author_id && \Auth::user()) {
            $this->author_id = \Auth::user()->id;
        }
        parent::save();
    }
}
