<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class productcolors extends Model
{
    public function colormanages(){

    	return $this->belongsTo('App\backend\colormanages','color_id');
    }
}
