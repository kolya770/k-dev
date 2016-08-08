<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UTM extends Model
{
    protected $fillable = ['utm_name', 'utm_value', 'content_id', 'block_id'];

    protected $table = 'utm';
    
    /*
     * Each UTM is tied to a block. That's why each block has a possibility to
     * have multiple UTMs. 
     * @return Model
     */
    public function block() {
    	return $this->belongsTo('App\Models\Block');
    }

    /* 
     * One-to-one relationship with content.
     * @return Model
     */
    public function content() {
    	return $this->belongsTo('App\Models\Content');
    }


}
