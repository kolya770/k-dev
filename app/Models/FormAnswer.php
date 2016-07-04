<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormAnswer extends Model
{
    protected $fillable = ['title'];

    /**
     * Get the fields of the answered form.
     */
    public function fields() {
    	return $this->hasMany('App\Models\FieldAnswer');
    }
}
