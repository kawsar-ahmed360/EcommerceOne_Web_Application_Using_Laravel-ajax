<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backend\brands;
class BrandController extends Controller
{
    public function BrandView(){
       $data['brand'] = brands::get();
    	return view('backend/brands/view',$data);
    }

      public function BrandViewAjax(){
       $data['brand'] = brands::get();
    	return view('backend/brands/view_ajax',$data);
    }

    public function BrandSave(Request $Request){

    	if ($Request->ajax()) {

       return $this->insertBrand($Request);
    		
    	}
    }

    private function insertBrand($Request){

       $inse = new brands();
       $inse->brand_name = $Request->brand_name;
       $inse->status = '1';
       $inse->save();
    		return $this->BrandViewAjax($Request);
    }

    public function BrandActive(Request $Request){

    	if ($Request->ajax()) {
    		
    		return $this->DeactveCode($Request);
    	}
    }

    private function DeactveCode($Request){

    	$a = brands::find($Request->brandId);
    	$a->status='2';
    	$a->save();

    	return $this->BrandViewAjax($Request);
    }

    public function BrandDeactive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$d = brands::find($Request->brandId);
    		$d->status = '1';
    		$d->save();

    		return $this->BrandViewAjax($Request);
    	}
    }

    public function BrandDelete(Request $Request){

    	if ($Request->ajax()) {
    		
    		$de =brands::find($Request->brandId);
    		$de->delete();
          
          return $this->BrandViewAjax($Request);

    	}
    }

    public function BrandEdte(Request $Request){

     if ($Request->ajax()) {
     	
     	$edite =brands::find($Request->BrandId);
     	$edite->brand_name = $Request->brand_name;
     	$edite->save();
         return $this->BrandViewAjax($Request);

     }
    }


}
