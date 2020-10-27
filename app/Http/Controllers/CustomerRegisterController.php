<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer_registers;
use Mail;
use Cart;
use Session;
class CustomerRegisterController extends Controller
{
    public function CustoRegister(Request $Request){


        // return $Request->all();

    	$Request->validate([
         'fname'=>'required', 
         'lname'=>'required', 
         'email'=>'required', 
         'mobile'=>'required', 
         'password'=>'required', 
         'address'=>'required', 
    	]);

    	$code = rand(00000,999999);

    	$customer =new customer_registers();
    	$customer->fname = $Request->fname;
    	$customer->lname = $Request->lname;
    	$customer->email = $Request->email;
    	$customer->mobile = $Request->mobile;
    	$customer->code = $code;
    	$customer->password = bcrypt($Request->password);
    	$customer->address = $Request->address;

    	$customer->save();

        Session::put('customer_id',$customer->id);
        Session::put('customer_name',$customer->fname.' '.$customer->lname);


    	$data = array(
         'email'=>$Request->email,
         'code'=>$code,
    	);



    	Mail::send('fontend/mail/confirm_mail',$data,function($message)use($data){
         $message->from('a.b123kwsar@gmail.com','new shop admin');
         $message->to($data['email']);
         $message->subject('Confirmation mail please Verify Email address');

    	});


    	return redirect()->route('CustoVerifyMail')->with($data);
	
    }

    public function CustoVerifyMail(){
       

     return view('fontend/mail/verify_mail');

    }

    public function CustoVerifyMailpost(Request $Request){

        $Request->validate([
        'email'=>'required',
        'code'=>'required',
        ]);

        $variry = customer_registers::where('email',$Request->email)->where('code',$Request->code)->first();

        if ($variry) {

            if (Cart::count()>0) {
                
                   $no = array(
                   
                   'message'=>'Verify Successfull Than Plesae login here',
                   'alert-type'=>'success',
            );
            
            return redirect()->route('ShippingForm')->with($no);
            }else{

                return redirect()->route('Dashbord');
            }

        }else{

            $noti = array(
                   
                   'message'=>'Email or varification code not match please try again!!!!!!!!!!!!',
                   'alert-type'=>'error',
            );

            return redirect()->back()->with($noti);
        }


    }

    public function CustoLogin(Request $Request){

        $match = customer_registers::where('email',$Request->email)->first();

         if (password_verify($Request->password, $match->password)) {
           
           Session::put('customer_id',$match->id); 
           Session::put('customer_name',$match->fname .' '.$match->lname); 

           if (Cart::count()>0) {
               
           return redirect('/shipping_form');
           }else{

           return redirect()->route('Dashbord');

           }


         }else{

            $noti = array(
            'message'=>'Please Submit Valie Email Address!!!',
            'alert-type'=>'error',
            );
           
            return redirect()->back()->with($noti);

         }
    }  


    //.........................New Customer Login....................







    //   public function CustomerLoginpost(Request $Request){

    //     $match = customer_registers::where('email',$Request->email)->first();

    //      if (password_verify($Request->password, $match->password)) {
           
    //        Session::put('customer_id',$match->id); 
    //        Session::put('customer_name',$match->fname .' '.$match->lname); 

    //        return redirect('/');

    //      }else{

    //         $noti = array(
    //         'message'=>'Please Submit Valie Email Address!!!',
    //         'alert-type'=>'error',
    //         );
           
    //         return redirect()->back()->with($noti);

    //      }
    // }




    //..................End new customer login system................

    public function logOut(Request $Request){
        
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');

    }
}
