<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    /**
     * Validation rules. Used to vaidate information from user.
     */
    private $rules = array(
    	'title'   => 'required',
        'content' => 'required',
        'preview' => 'mimes:jpeg,bmp,png,jpg'
    );

    private $errors;

    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);

        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors();
            return false;
        }

        // validation pass
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
}
