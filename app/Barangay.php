<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    public function save(array $options = [])
    {
        if (!$this->author_id && \Auth::user()) {
            $this->author_id = \Auth::user()->id;
        }
        parent::save();
    }
}
