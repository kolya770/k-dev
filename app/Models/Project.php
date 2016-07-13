<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'brief', 'description', 'main_image_id'];

    public function images() {
    	return $this->hasMany('App\Models\Image');
    }
}
