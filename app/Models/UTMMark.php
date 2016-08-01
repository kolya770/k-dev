<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UTMMark extends Model
{
    protected $fillable = ['mark'];

    public function values() {
    	return $this->hasMany('App\Models\UTMValue');
    }
}
