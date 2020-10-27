<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backend\sizes;
class SizeController extends Controller
{
    public function SizeView(Request $Request){
      $data['size'] = sizes::get();
    	return view('backend/size/view',$data);
    }

      public function SizeViewajax(Request $Request){
      $data['size'] = sizes::get();
    	return view('backend/size/view_ajax',$data);
    }

    public function SizeSave(Request $Request){

     return $this->sizeinsert($Request);
    }

    private function sizeinsert($Request){

    	if ($Request->ajax()) {
    		
    		$size = new sizes();
    		$size->size_name = $Request->size_name;
    		$size->status = '1';
    		$size->save();

    		return $this->SizeViewajax($Request);
    	}
    }

    public function SizeActive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = sizes::find($Request->SizeId);
    		$a->status = '2';
    		$a->save();

    		return $this->SizeViewajax($Request);
    	}
    }

    public function SizeDeactive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$d = sizes::find($Request->SizeId);
    		$d->status = '1';
    		$d->save();

    		return $this->SizeViewajax($Request);
    	}
    }

    public function SizeDelete(Request $Request){

    	if ($Request->ajax()) {
    		
    		$de =sizes::find($Request->SizeId); 
    		$de->delete();
    		return $this->SizeViewajax($Request);

    	}
    }

    public function SizeEdite(Request $Request){

        return $this->editesize($Request);
    }

    private function editesize($Request){

        if ($Request->ajax()) {
            
            $edite = sizes::find($Request->SiseId);
            $edite->size_name = $Request->size_name;
            $edite->save();
            return $this->SizeViewajax($Request);
        }
    }




}
