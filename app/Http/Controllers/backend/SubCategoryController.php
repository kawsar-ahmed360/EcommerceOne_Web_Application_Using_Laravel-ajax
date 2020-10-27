<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backend\categorys;
use App\backend\subcategorys;
use DB;
class SubCategoryController extends Controller
{
    public function SubCategoryVew(){
      $data['category'] = categorys::where('status','2')->get();
      $data['subcategory'] = DB::table('subcategorys')
                               ->join('categorys','subcategorys.category_id','categorys.id')
                               ->select('subcategorys.*','categorys.category_name')
                               ->get();
    	return view('backend/sub_category/view',$data);
    }

      public function SubCategoryVewAjax(){
      $data['category'] = categorys::where('status','2')->get();
       $data['subcategory'] = DB::table('subcategorys')
                               ->join('categorys','subcategorys.category_id','categorys.id')
                               ->select('subcategorys.*','categorys.category_name')
                               ->get();
    	return view('backend/sub_category/view_ajax',$data);
    }

    public function SubCategorySave(Request $Request){

    	$Request->validate([
        'category_id'=>'required',
        'sub_category'=>'required',
    	]);

    	if ($Request->ajax()) {
    		
    		$ins =new subcategorys();
    		$ins->category_id = $Request->category_id;
    		$ins->sub_category = $Request->sub_category;
    		$ins->status = '1';
    		$ins->save();

    		return $this->SubCategoryVewAjax($Request);
    	}
    }

    public function SubCategoryActive(Request $Request){

    	

    	if ($Request->ajax()) {
    		
    		$a =subcategorys::find($Request->SubId);
    		$a->status='2';
    		$a->save();

    		return $this->SubCategoryVewAjax($Request); 
    	}
    }

    public function SubCategoryDeactive(Request $Request){

    	if ($Request->ajax()) {
    		
    		$d =subcategorys::find($Request->SubId);
    		$d->status ='1';
    		$d->save();

    		return $this->SubCategoryVewAjax($Request);  
    	}
    }

    public function SubCategoryDelete(Request $Request){

    	if ($Request->ajax()) {
    		
    		$d =subcategorys::find($Request->SubId);
    		$d->delete();

    		return $this->SubCategoryVewAjax($Request); 
    	}
    }

    public function SubCategoryEdite(Request $Request){

    	if ($Request->ajax()) {
    		
    		$edite =subcategorys::find($Request->subId);
    		$edite->category_id = $Request->category_id;
    		$edite->sub_category = $Request->sub_category;
    		$edite->save();

    		return $this->SubCategoryVewAjax($Request);  
    	}
    }
}
