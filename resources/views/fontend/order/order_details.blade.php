@extends('fontend/master')

@section('content')

	<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Your Order Details</span></h3>
			</div>
		</div>
	<!--banner-->
		<!--content-->
			<div class="content">
				<!--contact-->
					<div class="mail-w3ls">
						<div class="container">
							
							<h3 class="text-center well" style="font-size: 24px;color:green;" ><i>Your Order Details Page</i></h3>

							<div class="form-row">


								 <div class="col-md-3">
								 	  <div class="nav">
								 	  	<ul style="list-style-type: none">
								 	  	    <li style="text-align: center;background-color: silver;margin-top: 5px;padding: 5px;border-radius: 5px;"><a style="display: block;color:black;text-decoration: none" href="{{ route('/newshop') }}"><i class="fa fa-home"></i>Home</a></li>
								 	  	    <li style="text-align: center;background-color: silver;margin-top: 5px;padding: 5px;border-radius: 5px;"><a style="display: block;color:black;text-decoration: none" href=""><i class="fa fa-key"></i>Password Change</a></li>
								 	  	    <li style="text-align: center;background-color: silver;margin-top: 5px;padding: 5px;border-radius: 5px;"><a style="display: block;color:black;text-decoration: none" href="{{ route('CustomerOrder') }}"><i class="fa fa-shopping-cart"></i>Your Order</a></li>
								 	  	    <li style="text-align: center;background-color: silver;margin-top: 5px;padding: 5px;border-radius: 5px;"><a style="display: block;color:black;text-decoration: none" href=""><i class="fa fa-heart"></i>Favorite Item</a></li>
								 	  	    <li style="text-align: center;background-color: silver;margin-top: 5px;padding: 5px;border-radius: 5px;"><a style="display: block;color:black;text-decoration: none" href="">Other</a></li>
								 	  	    
								 	  	</ul>
								 	  </div>
								 </div>

								 <div class="col-md-8 col-md-offset-1">

								 	 <div class="col-md-5 pull-left">
								 	 	 <h4 style="text-decoration: underline;"><strong>Customer Info</strong></h4>
								 	 	 <span><b>Name : </b> <i>{{ $order['0']->fname.' '.$order['0']->lname }}</i></span> <br>
								 	 	 <span><b>Email :</b> <i>{{ $order['0']->email }}</i></span><br>
								 	 	 <span><b>Mobile : </b> <i>{{ $order['0']->mobile }}</i></span><br>
								 	 	 <span><b>address : </b> <i>{{ $order['0']->address }}</i></span>
								 	 </div>
								 	 <div class="col-md-5 pull-right">
								 	 	<h4 style="text-decoration: underline;"><strong>Shipping Info :</strong></h4>
								 	 	<span><b>Name : </b> <i>{{ $order['0']->name }}</i></span> <br>
								 	 	<span><b>Email : </b> <i>{{ $order['0']->email }}</i></span> <br>
								 	 	<span><b>Mobile : </b> <i>{{ $order['0']->mobile }}</i></span> <br>
								 	 	<span><b>Address : </b> <i>{{ $order['0']->address }}</i></span> <br>
								 	 	<span><b>Order Date : </b> <i>{{ $order['0']->created_at }}</i></span> <br>
								 	 </div>

								 </div>

								    <h4 style=""><strong style="margin-left: 120px">Order Details :</strong></h4>
								 <div class="col-md-8 col-md-offset-1 well">
								 	 	<table id="datatable" class="table table-bordered" style="width: 100%">
								 	 		<thead>
								 	 			<tr style="text-align: center">
								 	 				<th>Sl</th>
								 	 				<th>Product Name</th>
								 	 				<th>Product Price</th>
								 	 				<th>Product Qty</th>
								 	 				{{-- <th>Product subtotal</th> --}}
								 	 				<th>Product Color</th>
								 	 				<th>Product Size</th>
								 	 				<th>Image</th>
								 	 				
								 	 			</tr>
								 	 		</thead>
								 	 		<tbody>

								 	 			@php($sl=1)
								 	 		@foreach($details as $o)
                                                  <tr style="text-align: center">
                                                  	<td>{{ $sl++ }}</td>
                                                  	<td>{{ $o->product_name }}</td>
                                                  	<td>${{ $o->product_price }}</td>
                                                  	<td>{{ $o->product_qty }}</td>
                                                  	{{-- <td>{{ $o->product_qty }}</td> --}}
                                                  	<td>{{ $o->color_name }}</td>
                                                  	<td>{{ $o->size_name }}</td>
                                                  	<td><img src="{{ url('backend/product_image/'.$o->image) }}" width="40px" alt=""></td>
                                                  	
                                                  </tr>
								 	 		@endforeach

								 	 		<tr>
								 	 			<td colspan="8" align="center"><strong style="font-size: 20px"><spam>Payment System : </spam></strong>{{ $order['0']->payment }} </td>
								 	 		</tr>
								 	 		</tbody>
								 	 	</table>
								 	
								 </div>



							</div>


					

						</div>
					</div>
				<!--contact-->
			</div>
		<!--content-->


@endsection