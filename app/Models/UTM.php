<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UTM extends Model
{
    protected $fillable = ['utm_name', 'utm_value', 'content_id', 'block_id'];

    protected $table = 'utm';

    public function block() {
    	return $this->belongsTo('App\Models\Block');
    }

    public function content() {
    	return $this->belongsTo('App\Models\Content');
    }


}
