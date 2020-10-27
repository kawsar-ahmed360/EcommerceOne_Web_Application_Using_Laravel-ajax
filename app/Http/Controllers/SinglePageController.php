<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\backend\subcategorys;
use App\backend\products;
class SinglePageController extends Controller
{
    public function MenColthing(){

    	return view('fontend/single_page/men_clothing');
    }

       public function MailUs(){

    	return view('fontend/single_page/mail_us');
    }

    public function CustomerLogin(){

    	return view('fontend/auth/login');
    }

        public function CustomerRegistation(){

    	return view('fontend/auth/register');
    }

   public function womentsubcategroyMatch($id){

        $data['WomSubWisePro'] = products::where('subcategory_id',$id)->get();

        return view('fontend/single_page/WomentsubCatWisePro',$data); 
    }

    public function MensubcategroyMatch($id){

        $data['menCategory'] = products::where('subcategory_id',$id)->get();
        return view('fontend/single_page/MensubCatWisePro',$data);
    }

    public function MensubcategroyProductpage($id){

         $data['MenSubproductPagee'] = products::where('subcategory_id',$id)->get();

        return view('fontend/single_page/Men_ProductpageSubcat',$data);
        
    }

    public function SingleProductView($slug){

        $data['single'] = products::where('slug',$slug)->first();

        return view('fontend/single_page/Single_ProductView',$data);
    }

       public function brandwsepro($id){

        $data['menCategory'] = products::where('category_id','1')->where('brand_id',$id)->get();

        return view('fontend/single_page/man_brand_wise_product',$data);
    }
}
