<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backend\categorys;
class CategoryController extends Controller
{
    public function CategoryVew(){

    	$data['category'] =categorys::get(); 

    	return view('backend/category/view',$data);
    }  

      public function CategoryVewAjax(){
      	$data['category'] =categorys::get(); 

    	return view('backend/category/view_ajax',$data);
    }

    public function CategorySave(Request $Request){

    	if ($Request->ajax()) {
    		
    		$inser = new categorys();
    		$inser->category_name = $Request->category_name;
    		$inser->status = '1';
    		$inser->save();

    		return $this->CategoryVewAjax($Request);
    	}
    }

    public function CategoryActive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$ac = categorys::find($Request->CatId);
    		$ac->status ='2';
    		$ac->save();
    		return $this->CategoryVewAjax($Request);
    	}
    }

    public function CategoryDeactive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$de = categorys::find($Request->CatId);
    		$de->status ='1';
    		$de->save();
    		return $this->CategoryVewAjax($Request);
    	}
    } 

       public function CategoryDelete(Request $Request){

    	if ($Request->ajax()) {
    		
    		$de = categorys::find($Request->CatId);
    		$de->delete();
    		return $this->CategoryVewAjax($Request);
    	}
    }

    public function CategoryEdite(Request $Request){

    	if ($Request->ajax()) {
    		
    		$edite =categorys::find($Request->CateoryId);
    		$edite->category_name = $Request->category_name;
    		$edite->save();

    		return $this->CategoryVewAjax($Request);  
    	}
    }
}
