<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
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
use PDF;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
class OrderController extends Controller
{
    public function OrderList(){


        $data['order'] = DB::table('orders')
                         ->join('customer_registers','orders.customer_id','customer_registers.id')
                         ->join('payments','payments.order_id','orders.id')
                         ->select('orders.*','customer_registers.fname','customer_registers.lname','customer_registers.mobile','payments.payment_status')
                         ->get();

                         // return $data['order'];
    	return view('backend/order/order_list',$data);
    }

    public function cus_order_details($id){

    	$data['ord'] = DB::table('orders')
    	              ->join('customer_registers','orders.customer_id','customer_registers.id')
    	              ->join('shippings','orders.shipping_id','shippings.id')
    	              ->join('payments','payments.order_id','orders.id')
    	              ->join('orders_details','orders_details.order_id','orders.id')
    	              ->select('orders.*','shippings.*','payments.*','orders_details.*','customer_registers.*')
    	              ->where('orders.id',$id)
    	              ->get();

    	            // return $data['ord'];  

    	              $data['details'] = DB::table('orders_details')
    	                                  ->join('colormanages','orders_details.product_color','colormanages.id')
    	                                  ->join('sizes','orders_details.product_size','sizes.id')
    	                                  ->join('products','orders_details.product_id','products.id')
    	                                  ->join('payments','orders_details.payment_id','payments.id')
    	                                  ->select('orders_details.*','colormanages.color_name','sizes.size_name','products.image','payments.payment')
    	                                 ->where('orders_details.order_id',$id)->get();

    	return view('backend/order/eye',$data);
    }

    public function cus_order_detailspdf($id){

    	$data['ord'] = DB::table('orders')
    	              ->join('customer_registers','orders.customer_id','customer_registers.id')
    	              ->join('shippings','orders.shipping_id','shippings.id')
    	              ->join('payments','payments.order_id','orders.id')
    	              ->join('orders_details','orders_details.order_id','orders.id')
    	              ->select('orders.*','shippings.*','payments.*','orders_details.*','customer_registers.*')
    	              ->where('orders.id',$id)
    	              ->get();


    	$data['details'] = DB::table('orders_details')
    	                                  ->join('colormanages','orders_details.product_color','colormanages.id')
    	                                  ->join('sizes','orders_details.product_size','sizes.id')
    	                                  ->join('products','orders_details.product_id','products.id')
    	                                  ->join('payments','orders_details.payment_id','payments.id')
    	                                  ->select('orders_details.*','colormanages.color_name','sizes.size_name','products.image','payments.payment')
    	                                 ->where('orders_details.order_id',$id)->get();


    	$pdf = PDF::loadView('backend/pdf/order_details', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');


    }

    public function OrderExportDownload(){
        
        return Excel::download(new OrderExport, 'orders.xlsx');

    }

    public function orderApprove($id){

    	$order = orders::where('id',$id)->update(['status'=>'2']);

    	$payemth = payments::where('order_id',$id)->update(['payment_status'=>'2']);

    	$noti = array(
           'message'=>'Product Successfully Approve',
           'alert-type'=>'success',
    	);

    	return redirect()->back()->with($noti);
    }

    public function orderDelete($id){
         

         DB::transaction(function()use($id){
             
             $order = orders::where('id',$id)->first();
             $ship =$order->shipping_id; 
             $order = orders::where('id',$id)->delete();
             $payment = payments::where('order_id',$id)->delete();
             $shipping = shippings::where('id',$ship)->delete();

             $deta = orders_details::where('order_id',$id)->get();

             foreach ($deta as $value) {
             	$value->delete();
             }
         });

         $noti = array(
           'message'=>'Product Successfully delete',
           'alert-type'=>'success',
    	);

    	return redirect()->back()->with($noti);

    }
}
