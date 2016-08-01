<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UTMValue extends Model
{
    protected $fillable = ['value', 'mark_id'];

    public function mark() {
    	return $this->belongsTo('App\Models\UTMMark');
    }
}
