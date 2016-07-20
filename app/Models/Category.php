<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Category extends Model
{
    protected $fillable = ['title']; //сделать типа такого для реквайрд

    /**
     * Validation rules. Used to vaidate information from user.
     */
    private $rules = array(
    	'title'   => 'required',
    );

    private $errors;

    public function validate($data) {
        // make a new validator object
        $v = Validator::make($data, $this->rules);

        // check for failure
        if ($v->fails()) {
            // set errors and return false
            $this->errors = $v->errors();
            return false;
        }

        // validation pass
        return true;
    }

    public function errors() {
        return $this->errors;
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }
}
