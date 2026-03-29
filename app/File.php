<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function filecategory()
    {
        return $this->belongsTo(Filecategory::class, 'file_category', 'id');
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
