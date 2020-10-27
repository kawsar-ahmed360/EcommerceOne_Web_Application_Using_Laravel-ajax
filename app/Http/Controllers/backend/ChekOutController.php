<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\customer_registers;
use App\shippings;
use App\orders;
use App\backend\products;
use App\payments;
use App\orders_details;
use App\best_sellings;
use Session;
use DB;
use Cart;
class ChekOutController extends Controller
{
    public function CheckOut(){

    	return view('fontend/checkout/checkout_content');
    }

    public function ShippingForm(){

    	$data['customer'] = customer_registers::where('id',Session::get('customer_id'))->first();

      if (Session::get('customer_id')) {
        
    	return view('fontend/checkout/shipping_info',$data);
      }else{
       
        return redirect()->back();

      }

    }

    public function Shippingpost(Request $Request){

       $shipping = new shippings();
       $shipping->customer_id = Session::get('customer_id');
       $shipping->name = $Request->name;
       $shipping->email = $Request->email;
       $shipping->mobile = $Request->mobile;
       $shipping->address = $Request->address;
       $shipping->save();

      Session::put('shipping_id',$shipping->id);

      

       return redirect()->route('Payment');
    }

    public function Payment(){



    	return view('fontend/payment/paymet_page');
    }

    public function Paymentpost(Request $Request){



   


    	DB::transaction(function()use($Request){
          
           $order =new orders();
           $order->shipping_id = Session::get('shipping_id');
           $order->customer_id = Session::get('customer_id');
           $order->total_qty = $Request->count;
           $order->tax = $Request->tax;
           $order->subtotal = $Request->subtotal;
           $order->total_price = $Request->total;
           $order->status = '1';
           $order->save();

           Session::put('order_id',$order->id);

           $payment = new payments();

           if ($Request->payment=='CashOnDelevery') {
              $payment->shipping_id = Session::get('customer_id');
           $payment->customer_id = Session::get('shipping_id');
           $payment->order_id = Session::get('order_id');
           $payment->payment = 'CashOnDelevery';
           $payment->payment_status = '1';
           $payment->save();
           }elseif($Request->payment=='Paypal'){

             $payment->shipping_id = Session::get('customer_id');
           $payment->customer_id = Session::get('shipping_id');
           $payment->order_id = Session::get('order_id');
           $payment->payment = 'Paypal';
           $payment->payment_status = '1';
           $payment->save();
           }elseif($Request->payment=='Stripe'){
             
               $payment->shipping_id = Session::get('customer_id');
           $payment->customer_id = Session::get('shipping_id');
           $payment->order_id = Session::get('order_id');
           $payment->payment = 'Stripe';
           $payment->payment_status = '1';
           $payment->save();

        \Stripe\Stripe::setApiKey("sk_test_51HDTxYKJDCubtdTWLP8s1GrgMNFtTfosmBbfz1i6bYUzK76YSk1Q0EqPOzUqbMNN9lwTtpwU0xrdJdCApFDvksfY00qs06w84g");

            \Stripe\Charge::create([
              'amount' => 100*number_format(Cart::total()),
              'currency' => 'usd',
               'source'=>$Request->stripeToken,
            ]);

           }
          

           Session::put('payment_id',$payment->id);


           $cart = Cart::content();

           foreach ($cart as $key=>$cart_cont) {
           $order_det =new orders_details();
           $order_det->customer_id =Session::get('customer_id');
           $order_det->shipping_id =Session::get('shipping_id');
           $order_det->order_id =Session::get('order_id'); 
           $order_det->payment_id=Session::get('payment_id');
           $order_det->product_id = $cart_cont->id;
           $order_det->product_name = $cart_cont->name;
           $order_det->product_price = $cart_cont->price;
           $order_det->product_qty = $cart_cont->qty;
           $order_det->product_color = $cart_cont->options['color'];
           $order_det->product_size = $cart_cont->options['size'];

           $order_det->save();


           }


           $order_dets =Cart::content();

           foreach ($order_dets as $key=>$order_detail) {

              

           	 if(best_sellings::where('product_id',$order_detail->id)->exists()){

           	 	 
           	 	 $qt = best_sellings::where('product_id',$order_detail->id)->first()->total_qty;

           	 	 $cal = $qt+$order_detail->qty;
                    
                  best_sellings::where('product_id',$order_detail->id)->update(['total_qty'=>$cal]);

           	 	 $pro = products::where('id',$order_detail->id)->first()->quentity;

           	 	 $procal =$pro-$order_detail->qty;  
                  products::where('id',$order_detail->id)->update(['quentity'=>$procal]);
                 
           	 }else{
           	  $best_selling =new best_sellings();
           	   $best_selling->product_id =$order_detail->id; 

           	   $best_selling->total_qty =$order_detail->qty; 
           	 $best_selling->save();

           	 }

           	   
           }

           Cart::destroy();







    	});

    	return redirect()->route('CustomerOrder');
    }
}
