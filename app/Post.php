<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
	{
		return $this->belongsTo('App\Category', 'category_id');
	}
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
	public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && \Auth::user()) {
            $this->author_id = \Auth::user()->id;
        }
        parent::save();
    }
}
