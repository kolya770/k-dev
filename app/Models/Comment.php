<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'comment', 'post_id'];

    /**
     * Validation rules. Used to vaidate information from user.
     */
    private $rules = array(
    	'name'   => 'required',
        'email' => 'required|email',
        'comment' => 'required'
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
}
