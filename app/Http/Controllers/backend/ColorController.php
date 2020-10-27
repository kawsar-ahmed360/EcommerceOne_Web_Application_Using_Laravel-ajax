<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backend\colormanages;
class ColorController extends Controller
{
    public function ColorView(){
      
       $data['color'] =colormanages::get(); 
    	return view('backend/color/view',$data);
    }

      public function ColorViewAjax(){
      
       $data['color'] =colormanages::get(); 
    	return view('backend/color/view_ajax',$data);
    }

    public function ColorSave(Request $Request){

    	$Request->validate([
         'color_name'=>'required|unique:colormanages,color_name',

    	]);

    	return $this->colorinsert($Request);


    }

    private function colorinsert($Request){

    if ($Request->ajax()) {
    		
    		$s = new colormanages();
    		$s->color_name = $Request->color_name;
    		$s->status='1';
    		$s->save();

    		return $this->ColorViewAjax($Request);
    	}
    }

    public function ColorActive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a =colormanages::find($Request->ColorId);
    		$a->status='2';
    		$a->save();

    		return $this->ColorViewAjax($Request); 
    	}
    }

    public function ColorDeactive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$d = colormanages::find($Request->ColorId);
    		$d->status='1';
    		$d->save();

    		return $this->ColorViewAjax($Request); 
    	}
    }

    public function ColorDelete(Request $Request){

    	if ($Request->ajax()) {
    		
    		$d =colormanages::find($Request->ColorId);
    		$d->delete();

    		return $this->ColorViewAjax($Request);  
    	}
    }

    public function ColorEdite(Request $Request){
      
      if ($Request->ajax()) {
      	
       return $this->editecolor($Request);
      }

    }

    private function editecolor($Request){

    	$edite =colormanages::find($Request->ColorId); 

    	$Request->validate([
        'color_name'=>'required|unique:colormanages,color_name',
    	]);

    	$edite->color_name = $Request->color_name;
    	$edite->save();
    	return $this->ColorViewAjax($Request); 

    }


}
