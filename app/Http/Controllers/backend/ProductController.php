<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backend\products;
use App\backend\brands;
use App\backend\categorys;
use App\backend\colormanages;
use App\backend\sizes;
use App\backend\subcategorys;
use App\backend\productcolors;
use App\backend\productgallerys;
use App\backend\productsizes;
use DB;
use Image;
use Session;
class ProductController extends Controller
{
    public function ProductView(){
        $data['product'] = DB::table('products')
                          ->join('categorys','products.category_id','categorys.id')
                          ->join('subcategorys','products.subcategory_id','subcategorys.id')
                          ->join('brands','products.brand_id','brands.id')
                          ->select('products.*','categorys.category_name','subcategorys.sub_category','brands.brand_name')
                          ->get();
    	return view('backend/product/view',$data);
    }

    public function Productsubcatajax(Request $Request){

      $sub = subcategorys::where('category_id',$Request->cat)->where('status','2')->get();

      return response()->json($sub);
    }

    public function ProductAdd(){
      $data['color'] = colormanages::where('status','2')->get();
      $data['size'] = sizes::where('status','2')->get();
      $data['cat'] = categorys::where('status','2')->get();
      $data['sub_cat'] = subcategorys::where('status','2')->get();
      $data['brand'] = brands::where('status','2')->get();
    	return view('backend/product/add_product',$data);
    }

    protected function productValidate($Request){


    	$Request->validate([
         'product_name'=>'required',
         'category_id'=>'required',
         'subcategory_id'=>'required',
         'brand_id'=>'required',
         'summary'=>'required',
         'description'=>'required',
         'price'=>'required',
         'quentity'=>'required',
         'color_id'=>'required',
         'size_id'=>'required',
         
    	]);
    }

    public function ProductSave(Request $Request){
     
         $this->productValidate($Request);

    

    	DB::transaction(function()use($Request){
           
            $this->productinfosave($Request);
            $this->productColor($Request);
            $this->productSize($Request);
            $this->productGellary($Request);

    	});



         return redirect()->back();   


    }

    protected function productinfosave($Request){

      $slug = str_replace(' ', '-', $Request->product_name);

      $cou = products::where('slug',$slug)->count();

      if ($cou>0) {
        
         $slug = time().'.'.$slug; 
      }

    	$insert = new products();
    	$insert->product_name = $Request->product_name;
    	$insert->category_id = $Request->category_id;
    	$insert->subcategory_id = $Request->subcategory_id;
    	$insert->brand_id = $Request->brand_id;
    	$insert->summary = $Request->summary;
    	$insert->description = $Request->description;
    	$insert->price = $Request->price;
    	$insert->quentity = $Request->quentity;
      $insert->slug = $slug;
          
           if ($Request->hasFile('image')) {
           	 $image = $Request->file('image');
           	 $full_name = time().'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(300,320)->save('backend/product_image/'.$full_name);
             $insert->image = $full_name;
           }


    	$insert->save();

          Session::put('product_id',$insert->id); 

    }

    protected function productColor($Request){

    	$color =  $Request->color_id;

    	if ($color) {

    		$product_id = Session::get('product_id');
    		
    		foreach ($color as $key=>$color_id) {
    			
    			$color_insert = new productcolors();
    			$color_insert->product_id = $product_id;
    			$color_insert->color_id = $color_id;
    			$color_insert->save();
    		}
    	}
    }

    protected function productSize($Request){

    	$size = $Request->size_id;

    	if ($size) {

    		 $product_id = Session::get('product_id');
    		
    		foreach ($size as $key=>$size_id) {
    			
    			$size = new productsizes();
    			$size->product_id = $product_id;
    			$size->size_id = $size_id;
    			$size->save();
    		}
    	}
    }

    protected function productGellary($Request){
    		$product_id = Session::get('product_id');

    	if ($Request->hasFile('product_gallery')) {

    		
    		$imageGallery = $Request->file('product_gallery');

    		foreach ($imageGallery as $key=>$Gall) {
    			
    			$GalleryFullName = $key.time().uniqid().'.'.$Gall->getClientOriginalExtension();

    			Image::make($Gall)->resize(400,450)->save('backend/Gallery/'.$GalleryFullName);
    			$inserGallery = new productgallerys();
    			$inserGallery->product_id = $product_id;
    			$inserGallery->product_gallery = $GalleryFullName;
    			$inserGallery->save(); 
    		}
    	}
    }

    public function ProductEye($id){

    	$data['product_info'] =DB::table('products')
                      ->join('categorys','products.category_id','categorys.id')
                      ->join('subcategorys','products.subcategory_id','subcategorys.id')
                      ->join('brands','products.brand_id','brands.id')
                      ->select('products.*','categorys.category_name','subcategorys.sub_category','brands.brand_name')
                      ->where('products.id',$id)
                      
                      ->get();

            $data['color'] = DB::table('productcolors')
                             ->join('colormanages','productcolors.color_id','colormanages.id')
                             ->select('productcolors.*','colormanages.color_name')
                             ->where('productcolors.product_id',$id)->get(); 

              $data['size'] = DB::table('productsizes')
                 ->join('sizes','productsizes.size_id','sizes.id')
                   ->select('productsizes.*','sizes.size_name')
                    ->where('productsizes.product_id',$id)->get(); 


               $data['gallery'] = DB::table('productgallerys')
                    ->where('productgallerys.product_id',$id)->get(); 

                    // return $data['gallery'];                   


    	return view('backend/product/eye',$data); 
    }

    public function ProductEdite($id){

         $data['edite'] = products::find($id);
         $data['color'] = colormanages::where('status','2')->get();
         $data['size'] = sizes::where('status','2')->get();
         $data['cat'] = categorys::where('status','2')->get();
         $data['sub_cat'] = subcategorys::where('status','2')->get();
         $data['brand'] = brands::where('status','2')->get();

         $data['product_color'] =productcolors::where('product_id',$id)->select('color_id')->get()->toArray(); 
         $data['product_size'] =productsizes::where('product_id',$id)->select('size_id')->get()->toArray(); 

         // return $data['product_color'];

         return view('backend/product/add_product',$data);
    }

    //........................Update Peart .....................


    public function ProductUpdate(Request $Request){


            $this->proBasicInfoUpdate($Request);
            $this->proImageUpdate($Request);
            $this->proColorUpdate($Request);
            $this->proSizeUpdate($Request);
            $this->proGalleryUpdate($Request);
          return redirect()->route('ProductView')->with('success');
    }

    protected function proBasicInfoUpdate($Request){

        $product_id = $Request->product_id;

         $edite = products::where('id',$product_id)->first();
         $edite->product_name = $Request->product_name;
         $edite->category_id = $Request->category_id;
         $edite->subcategory_id = $Request->subcategory_id;
         $edite->brand_id = $Request->brand_id;
         $edite->summary = $Request->summary;
         $edite->description = $Request->description;
         $edite->price = $Request->price;
         $edite->quentity = $Request->quentity;
         $edite->save();
    }

    protected function proImageUpdate($Request){
         
         $product_id = $Request->product_id;

          $editeimage = products::where('id',$product_id)->first();

         if ($Request->hasFile('image')) {
            
             $image = $Request->file('image');
             $full_image = time().'.'.$image->getClientOriginalExtension();
             @unlink('backend/product_image/'.$editeimage->image);

             Image::make($image)->resize(300,320)->save('backend/product_image/'.$full_image);
             $editeimage->image = $full_image;
             $editeimage->save();
             
         }
    }

    protected function proColorUpdate($Request){

      $product_id = $Request->product_id;

       $color = $Request->color_id;

      productcolors::where('product_id',$product_id)->delete();
       if ($color) {
         
         foreach ($color as $colordele) {
            $update = new productcolors();
            $update->product_id = $product_id;
            $update->color_id = $colordele;
            $update->save();
         }
       }
    }

    protected function proSizeUpdate($Request){

       $product_id = $Request->product_id;

       $size = $Request->size_id;

       if ($size) {
         
         productsizes::where('product_id',$product_id)->delete();

         foreach ($size as $sizeupdate) {
           
            $size = new productsizes();
            $size->product_id = $product_id;
            $size->size_id = $sizeupdate;
            $size->save();
         }

       }
    }

    protected function proGalleryUpdate($Request){

      $product_id = $Request->product_id;

       $update = productgallerys::where('product_id',$product_id)->get();
      
       foreach ($update as $valuedelete) {

       $valuedelete->delete();
          
       @unlink('backend/Gallery/'.$valuedelete->product_gallery);
        } 


       if ($Request->hasFile('product_gallery')) {
           
           $gellaery = $Request->file('product_gallery');

           foreach ($gellaery as $key=>$Galleryall) {
              
              $updategallery = new productgallerys();

              $fullgallery = time().uniqid().$key.'.'.$Galleryall->getClientOriginalExtension();

              Image::make($Galleryall)->resize(400,430)->save('backend/Gallery/'.$fullgallery);

              $updategallery->product_id = $product_id;
              $updategallery->product_gallery = $fullgallery;
              $updategallery->save();          
          }           

       }
    }

    public function ProductDelete($id){

     
      DB::transaction(function()use($id){
           
         products::where('id',$id)->delete();

         $color = productcolors::where('product_id',$id)->delete();
         $size = productsizes::where('product_id',$id)->delete();

         $gallery =productgallerys::where('product_id',$id)->get(); 
         foreach ($gallery as $galleryall) {
           
           $galleryall->delete();
           @unlink('backend/Gallery/'.$galleryall->product_gallery);
         }
      });

      return redirect()->route('ProductView')->with('success');

    }
}
