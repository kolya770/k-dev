<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['title', 'size'];

    /**
     * Get the fields of the form created by admin.
     */
    public function fields() {
    	return $this->hasMany('App\Models\Field');
    }
}
