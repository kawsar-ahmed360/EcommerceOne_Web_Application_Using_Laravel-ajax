<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer_registers;
use App\best_sellings;
use App\orders;
use App\orders_details;
use App\colormanages;
use App\sizes;
use App\payments;
use App\products;
use App\shippings;
use Session;
use DB;
class CustomerDashbord extends Controller
{
    public function Dashbord(){

    	$data['customer'] =customer_registers::where('id',Session::get('customer_id'))->first();

    	if ($data['customer']) {
    		
    	return view('fontend/dashbord/dashbord',$data);
    	}else{

    		return redirect('/');
    	}

    }

    public function CustomerOrder(){
        
        $data['order'] = DB::table('orders')
                         ->join('shippings','orders.shipping_id','shippings.id')
                         ->select('orders.*','shippings.address')
                         ->where('orders.customer_id',Session::get('customer_id'))->get();

        // return $data['order']; 

        return view('fontend/order/customer_order',$data);

    }

    public function order_details($id){

    	$data['order'] = DB::table('orders')
    	         ->join('shippings','orders.shipping_id','shippings.id')
    	         ->join('customer_registers','orders.customer_id','customer_registers.id')
    	         ->join('payments','orders.id','payments.order_id')
    	         ->select('orders.*','shippings.*','customer_registers.*','customer_registers.mobile','payments.payment')
    	         ->where('orders.id',$id)->get();

    	     $data['details'] = DB::table('orders_details')
    	                       ->join('colormanages','orders_details.product_color','colormanages.id')
    	                       ->join('sizes','orders_details.product_size','sizes.id')
    	                       ->join('products','orders_details.product_id','products.id')
    	                       ->select('orders_details.*','colormanages.color_name','sizes.size_name','products.image')
    	                       ->where('orders_details.order_id',$id)->get();    

    	         return view('fontend/order/order_details',$data);
    }
}
