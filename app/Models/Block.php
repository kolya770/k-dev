<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = ['name', 'content_id', 'group_id'];

    public function group() {
    	return $this->belongsTo('App\Models\Group');
    }

    public function content() {
    	return $this->belongsTo('App\Models\Content');
    }
}
