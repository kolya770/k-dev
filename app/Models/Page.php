<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['number'];

    public function posts()
    {
    	return $this->hasMany('App\Models\Post');
    }
}
