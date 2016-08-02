<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
	/**
	 * The attributes that are fillable via mass assignment.
	 *
	 * @var array
	 */
    protected $fillable = ['name', 'url', 'description', 'keywords', 'copyright'];
}
