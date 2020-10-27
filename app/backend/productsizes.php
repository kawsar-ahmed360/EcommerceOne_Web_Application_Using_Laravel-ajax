<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class productsizes extends Model
{
    
    public function sizes(){
    	return $this->belongsTo('App\backend\sizes','size_id');
    }
}
