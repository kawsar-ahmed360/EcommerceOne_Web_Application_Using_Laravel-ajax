@extends('fontend/master')

@section('content')

	<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Your Order</span></h3>
			</div>
		</div>
	<!--banner-->
		<!--content-->
			<div class="content">
				<!--contact-->
					<div class="mail-w3ls">
						<div class="container">
							
							<h3 class="text-center well" style="font-size: 24px;color:green;" ><i>Welcome Your Order Page</i></h3>

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

								 <div class="col-md-8 col-md-offset-1 well">
								   
								 	 	<table id="datatable" class="table table-bordered" style="width: 100%">
								 	 		<thead>
								 	 			<tr style="text-align: center">
								 	 				<th>Sl</th>
								 	 				<th>Shpping Address</th>
								 	 				<th>Subtotal</th>
								 	 				<th>Tax</th>
								 	 				<th>Total</th>
								 	 				<th>Product Quentity</th>
								 	 				<th>Action</th>
								 	 				
								 	 			</tr>
								 	 		</thead>
								 	 		<tbody>

								 	 			@php($sl=1)
								 	 		@foreach($order as $o)
                                                  <tr style="text-align: center">
                                                  	<td>{{ $sl++ }}</td>
                                                  	<td>{{ $o->address }}</td>
                                                  	<td>${{ $o->subtotal }}</td>
                                                  	<td>${{ $o->tax }}</td>
                                                  	<td>${{ $o->total_price }}</td>
                                                  	<td><span class="badge badge-warning">{{ $o->total_qty }}</span></td>
                                                  	<td>
                                                  		<a href="{{ route('order_details',$o->id) }}" class="btn btn-primary btn-sm" title="Order Details"><i class="fa fa-eye"></i></a>
                                                  		<a href="" class="btn btn-success btn-sm" title="Order Details"><i class="fa fa-print"></i></a>
                                                  	</td>
                                                  </tr>
								 	 		@endforeach
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