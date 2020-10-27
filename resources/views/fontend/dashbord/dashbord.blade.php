@extends('fontend/master')

@section('content')

	<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Your Dashbord</span></h3>
			</div>
		</div>
	<!--banner-->
		<!--content-->
			<div class="content">
				<!--contact-->
					<div class="mail-w3ls">
						<div class="container">
							
							<h3 class="text-center well" style="font-size: 24px;color:green;" ><i>Welcome Your Dshbord</i></h3>

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

								 <div class="col-md-6 col-md-offset-1 well">
								 	 <table class="table table-bordered" style="text-align: center">
								 	 	<thead>
								 	 		<tr>
								 	 			<th colspan="2"><img style="margin-left: 150px" src="{{ url('fontend/pro.jpg') }}" alt="" width="250px"> <br>
                                                    <span class="badge badge-warning" style="margin-left:250px;padding: 3px">Customer</span>
								 	 			</th>
								 	 		</tr>


								 	 		<tr>
								 	 			<th style="padding-top: 15px">Your Name :<td style="padding-top: 15px">{{ $customer->fname.' '.$customer->lname }}</td></th>
								 	 		</tr>
								 	 		<tr>
								 	 			<th style="padding-top: 15px">Email :<td style="padding-top: 15px">{{ $customer->fname.' '.$customer->email }}</td></th>
								 	 		</tr>

								 	 		<tr>
								 	 			<th style="padding-top: 15px">Mobile :<td style="padding-top: 15px">{{ $customer->fname.' '.$customer->mobile }}</td></th>
								 	 		</tr>

								 	 		<tr>
								 	 			<th style="padding-top: 15px">Address :<td style="padding-top: 15px">{{ $customer->fname.' '.$customer->address }}</td></th>
								 	 		</tr>
								 	 		<tr>
								 	 			<td style="padding-top: 15px" colspan="2">
								 	 				<a href="" class="btn btn-success btn-sm">Edite Info</a>
								 	 				<a href="" class="btn btn-danger btn-sm">Password Change</a>
								 	 				<a href="" class="btn btn-info btn-sm">Upload Image</a>
								 	 			</td>
								 	 		</tr>
								 	 	</thead>
								 	 	
								 	 </table>
								 </div>
							</div>


					

						</div>
					</div>
				<!--contact-->
			</div>
		<!--content-->


@endsection