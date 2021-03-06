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

    public function utm() {
    	return $this->hasMany('App\Models\UTM');
    }

    public function utm_content() {
        return $this->belongsTo('App\Models\Content', 'utm_content_id');
    }
}
