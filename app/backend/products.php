<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    

    public function subcategorys(){

    	return $this->belongsTo('App\backend\subcategorys','subcategory_id');
    }
}
