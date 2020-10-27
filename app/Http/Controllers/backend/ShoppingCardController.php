<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backend\products;
use Cart;
class ShoppingCardController extends Controller
{
    public function ShoppingCard(Request $Request){

     $Request->validate([
         'color_id'=>'required',
         'size_id'=>'required',
    	]);

       
       $product = products::where('id',$Request->product_id)->first();

       Cart::add(['id' => $product->id, 'name' => $product->product_name, 'qty' => $Request->qty, 'price' => $product->price, 'weight' => 550, 'options' => ['size' => $Request->size_id, 'color'=>$Request->color_id,'image'=>$product->image]]);


       $noti = array(
         'message'=>'Successfully Card Added',
         'alert-type'=>'success',
       );

       return redirect()->route('ShoppingCardshow')->with($noti);
    
    }

    public function ShoppingCardshow(){

    	return view('fontend/cart/show');
    }

    public function ShoppingCardDelete($rowId){

    	Cart::remove($rowId);

    	$dele = array(
         'message'=>'Card SuccessFully Deleted',
         'alert-type'=>'error',
    	);

    	return redirect()->back()->with($dele);
    }

    public function ShoppingCardUpdate(Request $Request){

    	Cart::update($Request->rowId, $Request->qty_update);

    	$succ = array(
         'message'=>'Card SuccessFully Updated',
         'alert-type'=>'success',
    	);

    	return redirect()->back()->with($succ);
    }
}
