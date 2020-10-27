<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/',[
	 'uses'=>'NewShopController@index',
	 'as'=>'/newshop'
]);

route::get('/men_clothinng',[
   'uses'=>'SinglePageController@MenColthing',
   'as'=>'MenColthing'
]);

route::get('/mail_us',[
 'uses'=>'SinglePageController@MailUs',
 'as'=>'MailUs'
]);

route::get('/customer_login',[
 'uses'=>'SinglePageController@CustomerLogin',
 'as'=>'CustomerLogin'
]);

route::get('/customer_loginpost',[
 'uses'=>'SinglePageController@CustomerLoginpost',
 'as'=>'CustomerLoginpost'
]);

route::get('/customer_Registation',[
 'uses'=>'SinglePageController@CustomerRegistation',
 'as'=>'CustomerRegistation'
]);

route::get('/customer_Registationpost',[
 'uses'=>'SinglePageController@CustomerRegistationpost',
 'as'=>'CustomerRegistationpost'
]);






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//..............................Backend.......................

route::group(['middleware'=>['auth','AdminMiddleware']],function(){

//.....................Cateogry Manage.......................
	route::get('/category_view',[
     'uses'=>'backend\CategoryController@CategoryVew',
     'as'=>'CategoryVew',
	]);

	route::get('/category_view_ajax',[
     'uses'=>'backend\CategoryController@CategoryVewAjax',
     'as'=>'CategoryVewAjax',
	]);

	route::post('/category_save',[
     'uses'=>'backend\CategoryController@CategorySave',
     'as'=>'CategorySave',
	]);

   route::get('/category_active',[
     'uses'=>'backend\CategoryController@CategoryActive',
     'as'=>'CategoryActive',
	]);

      route::get('/category_deactive',[
     'uses'=>'backend\CategoryController@CategoryDeactive',
     'as'=>'CategoryDeactive',
	]);

     route::get('/category_delete',[
     'uses'=>'backend\CategoryController@CategoryDelete',
     'as'=>'CategoryDelete',
	]);

     route::post('/category_edite',[
     'uses'=>'backend\CategoryController@CategoryEdite',
     'as'=>'CategoryEdite',
	]);

     //......................Sub cateogry ...............

    route::get('/subcategory_view',[
     'uses'=>'backend\SubCategoryController@SubCategoryVew',
     'as'=>'SubCategoryVew',
	]);

	route::get('/subcategory_view_ajax',[
     'uses'=>'backend\SubCategoryController@SubCategoryVewAjax',
     'as'=>'SubCategoryVewAjax',
	]);

	route::post('/subcategory_save',[
     'uses'=>'backend\SubCategoryController@SubCategorySave',
     'as'=>'SubCategorySave',
	]);

	route::get('/subcategory_active',[
     'uses'=>'backend\SubCategoryController@SubCategoryActive',
     'as'=>'SubCategoryActive',
	]);

	route::get('/subcategory_deactive',[
     'uses'=>'backend\SubCategoryController@SubCategoryDeactive',
     'as'=>'SubCategoryDeactive',
	]);

	route::get('/subcategory_Delete',[
     'uses'=>'backend\SubCategoryController@SubCategoryDelete',
     'as'=>'SubCategoryDelete',
	]);

   route::post('/subcategory_Edite',[
     'uses'=>'backend\SubCategoryController@SubCategoryEdite',
     'as'=>'SubCategoryEdite',
	]);

  //.............................Brands Controller......................

  route::get('/brand_view',[
    'uses'=>'backend\BrandController@BrandView',
    'as'=>'BrandView',
  ]);

    route::get('/brand_view_ajax',[
    'uses'=>'backend\BrandController@BrandViewAjax',
    'as'=>'BrandViewAjax',
  ]);

   route::post('/brand_save',[
    'uses'=>'backend\BrandController@BrandSave',
    'as'=>'BrandSave',
  ]);

   route::get('/brand_active',[
    'uses'=>'backend\BrandController@BrandActive',
    'as'=>'BrandActive',
  ]);

    route::get('/brand_Deactive',[
    'uses'=>'backend\BrandController@BrandDeactive',
    'as'=>'BrandDeactive',
  ]);

      route::get('/brand_Delete',[
    'uses'=>'backend\BrandController@BrandDelete',
    'as'=>'BrandDelete',
  ]);	

   route::post('/brand_Edte',[
    'uses'=>'backend\BrandController@BrandEdte',
    'as'=>'BrandEdte',
  ]);

  //.....................Color Manage..........

   route::get('/color_View',[
     'uses'=>'backend\ColorController@ColorView',
     'as'=>'ColorView',
  ]);

    route::get('/color_ViewAjax',[
     'uses'=>'backend\ColorController@ColorViewAjax',
     'as'=>'ColorViewAjax',
  ]);	

  route::post('/color_Save',[
     'uses'=>'backend\ColorController@ColorSave',
     'as'=>'ColorSave',
  ]);

    route::get('/color_Active',[
     'uses'=>'backend\ColorController@ColorActive',
     'as'=>'ColorActive',
  ]);

      route::get('/color_Deactive',[
     'uses'=>'backend\ColorController@ColorDeactive',
     'as'=>'ColorDeactive',
  ]);

    route::get('/color_Delete',[
     'uses'=>'backend\ColorController@ColorDelete',
     'as'=>'ColorDelete',
  ]);

  route::post('/color_Edite',[
     'uses'=>'backend\ColorController@ColorEdite',
     'as'=>'ColorEdite',
  ]);

  //...................Size Management....................

   route::get('/size_view',[
     'uses'=>'backend\SizeController@SizeView',
     'as'=>'SizeView',
  ]);

   route::get('/size_viewajax',[
     'uses'=>'backend\SizeController@SizeViewajax',
     'as'=>'SizeViewajax',
  ]);

   route::post('/size_Save',[
     'uses'=>'backend\SizeController@SizeSave',
     'as'=>'SizeSave',
  ]);

   route::get('/size_Active',[
     'uses'=>'backend\SizeController@SizeActive',
     'as'=>'SizeActive',
  ]);

    route::get('/size_Deactive',[
     'uses'=>'backend\SizeController@SizeDeactive',
     'as'=>'SizeDeactive',
  ]);

   route::get('/size_Delete',[
     'uses'=>'backend\SizeController@SizeDelete',
     'as'=>'SizeDelete',
  ]);

    route::post('/size_Edite',[
     'uses'=>'backend\SizeController@SizeEdite',
     'as'=>'SizeEdite',
  ]);

  //.....................Product Controller.................

   route::get('/product_view',[
     'uses'=>'backend\ProductController@ProductView',
     'as'=>'ProductView',
  ]); 

     route::get('/product_Add',[
     'uses'=>'backend\ProductController@ProductAdd',
     'as'=>'ProductAdd',
  ]); 

     route::post('/product_Save',[
     'uses'=>'backend\ProductController@ProductSave',
     'as'=>'ProductSave',
  ]);

  route::get('/product_Eye/{id}',[
     'uses'=>'backend\ProductController@ProductEye',
     'as'=>'ProductEye',
  ]); 

    route::get('/product_Edite/{id}',[
     'uses'=>'backend\ProductController@ProductEdite',
     'as'=>'ProductEdite',
  ]);

       route::get('/product_subcatajax',[
     'uses'=>'backend\ProductController@Productsubcatajax',
     'as'=>'Productsubcatajax',
  ]);

      route::post('/product_Update',[
     'uses'=>'backend\ProductController@ProductUpdate',
     'as'=>'ProductUpdate',
  ]);

      route::get('/product_Delete/{id}',[
     'uses'=>'backend\ProductController@ProductDelete',
     'as'=>'ProductDelete',
  ]);

});




  //.....................Font End............	

     route::get('/woment_subcategory_match/{id}',[
     'uses'=>'SinglePageController@womentsubcategroyMatch',
     'as'=>'womentsubcategroyMatch',
  ]);

      route::get('/Men_subcategory_match/{id}',[
     'uses'=>'SinglePageController@MensubcategroyMatch',
     'as'=>'MensubcategroyMatch',
  ]);			
     

      route::get('/Men_subcategory_product_page/{id}',[
     'uses'=>'SinglePageController@MensubcategroyProductpage',
     'as'=>'MensubcategroyProductpage',
  ]);

   route::get('/Single_Product_view/{slug}',[
     'uses'=>'SinglePageController@SingleProductView',
     'as'=>'SingleProductView',
  ]);

  //......................Shopping Card.............

  route::post('/shoppingcard_add',[
  'uses'=>'backend\ShoppingCardController@ShoppingCard',
  'as'=>'ShoppingCard',
  ]);	

    route::get('/shoppingcard_show',[
  'uses'=>'backend\ShoppingCardController@ShoppingCardshow',
  'as'=>'ShoppingCardshow',
  ]);	

    route::get('/shoppingcard_Delete/{rowId}',[
  'uses'=>'backend\ShoppingCardController@ShoppingCardDelete',
  'as'=>'ShoppingCardDelete',
  ]);

     route::post('/shoppingcard_Update',[
  'uses'=>'backend\ShoppingCardController@ShoppingCardUpdate',
  'as'=>'ShoppingCardUpdate',
  ]); 

    route::get('/checkout',[
  'uses'=>'backend\ChekOutController@CheckOut',
  'as'=>'CheckOut',
  ]);

  //.........................Customer Regitared Controller.............	

   route::post('/customer_regis',[
  'uses'=>'CustomerRegisterController@CustoRegister',
  'as'=>'CustoRegister',
  ]);

      route::post('/customer_login',[
  'uses'=>'CustomerRegisterController@CustoLogin',
  'as'=>'CustoLogin',
  ]);


  //     route::post('/customer_login',[
  // 'uses'=>'CustomerRegisterController@CustoLogin',
  // 'as'=>'CustoLogin',
  // ]);

       route::post('/customer_logOut',[
  'uses'=>'CustomerRegisterController@logOut',
  'as'=>'logOut',
  ]);



    route::get('/customer_verifymail',[
  'uses'=>'CustomerRegisterController@CustoVerifyMail',
  'as'=>'CustoVerifyMail',
  ]);


    route::post('/customer_verifymailpost',[
  'uses'=>'CustomerRegisterController@CustoVerifyMailpost',
  'as'=>'CustoVerifyMailpost',
  ]);

    //...................Customer Dashbord.........

   route::get('/dashbord',[
  'uses'=>'CustomerDashbord@Dashbord',
  'as'=>'Dashbord',
  ]);    

  //................Shpping Address..................

     route::get('/shipping_form',[
  'uses'=>'backend\ChekOutController@ShippingForm',
  'as'=>'ShippingForm',
  ]);


   route::post('/shipping_post',[
  'uses'=>'backend\ChekOutController@Shippingpost',
  'as'=>'Shippingpost',
  ]);

  //..................Payment method.........

   route::get('/payment_method',[
  'uses'=>'backend\ChekOutController@Payment',
  'as'=>'Payment',
  ]);

     route::post('/payment_methodpost',[
  'uses'=>'backend\ChekOutController@Paymentpost',
  'as'=>'Paymentpost',
  ]);		

  //...................Customer Order........

  route::get('/customer_order',[
  'uses'=>'CustomerDashbord@CustomerOrder',
  'as'=>'CustomerOrder',
  ]); 

   route::get('/Details_order/{id}',[
  'uses'=>'CustomerDashbord@order_details',
  'as'=>'order_details',
  ]);


   //.........................Backend Orders.....................

   route::get('/order_list',[
  'uses'=>'backend\OrderController@OrderList',
  'as'=>'OrderList',
  ]); 

    route::get('/order_deta/{id}',[
  'uses'=>'backend\OrderController@cus_order_details',
  'as'=>'cus_order_details',
  ]);  


    //....................Order details Pdf........

    route::get('/order_detapdf/{id}',[
  'uses'=>'backend\OrderController@cus_order_detailspdf',
  'as'=>'cus_order_detailspdf',
  ]);

    //......................Exelll download,.....

   route::get('/order_download/{id}',[
  'uses'=>'backend\OrderController@OrderExportDownload',
  'as'=>'OrderExportDownload',
  ]);

   //.................Product Approve..

   route::get('/approve/{id}',[
  'uses'=>'backend\OrderController@orderApprove',
  'as'=>'orderApprove',
]);

   //..................Order Delete..



   route::get('/delete/{id}',[
  'uses'=>'backend\OrderController@orderDelete',
  'as'=>'orderDelete',
  ]);

  //...................Brand Wise Product..........


   route::get('/brand_product/{id}',[
  'uses'=>'SinglePageController@brandwsepro',
  'as'=>'brandwsepro',
  ]);




			


