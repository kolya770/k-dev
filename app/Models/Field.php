<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['question'];

    /**
     * Get a form the field belongs to.
     */
    public function form() {
    	return $this->belongsTo('App\Models\Form');
    }
}
