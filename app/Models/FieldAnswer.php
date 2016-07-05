<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldAnswer extends Model
{
    protected $fillable = ['answer'];

    /**
     * Get a form the field belongs to.
     */
    public function form() {
    	return $this->belongsTo('App\Models\FormAnswer');
    }

    /**
     * Get a field user has answered.
     */
    public function field() {
    	return $this->belongsTo('App\Models\Field');
    }
}
