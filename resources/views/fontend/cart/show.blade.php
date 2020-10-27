
@extends('fontend/master')

@section('content')

		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="cart-items">
				<div class="container">
					 <h3 class="text-center text-success" style="font-weight: bold">Shopping Cart View</h3>
					 <hr>
					<div class="form-row">
						 <div class="form-group col-md-11 col-md-offset-1">
						 	<table class="table table-bordered">
						 		<thead>
						 			<tr class="bg-primary text-center">
						 				<th style="font-size: 14px;color:white">Sl</th>
						 				<th style="font-size: 14px;color:white">Product Image</th>
						 				<th style="font-size: 14px;color:white">Product Name</th>
						 				<th style="font-size: 14px;color:white">Color Name</th>
						 				<th style="font-size: 14px;color:white">Size Name</th>
						 				<th style="font-size: 14px;color:white">Quentity</th>
						 				<th style="font-size: 14px;color:white">Price</th>
						 				<th style="font-size: 14px;color:white">Sub Total</th>
						 				<th style="font-size: 14px;color:white">Remove</th>
						 			</tr>
						 		</thead>
						 			@php
                                    $card = Cart::content();
                                    $sl=1;
						 			@endphp
						 		<tbody>
                               @foreach($card as $c)

                               @php
                                    $colorName = App\backend\colormanages::where('id',$c->options['color'])->first();
                                    $sizeName = App\backend\sizes::where('id',$c->options['size'])->first();
                               @endphp
						 			<tr style="text-align: center">
						 				<td>{{ $sl++ }}</td>
						 				<td><img src="{{ url('backend/product_image/'.$c->options['image']) }}" width="70px" alt=""></td>
						 				<td style="vertical-align: middle;">{{ $c->name }}</td>
						 				<td style="vertical-align: middle;">{{ $colorName->color_name }}</td>
						 				<td style="vertical-align: middle;">{{ $sizeName->size_name }}</td>
						 				<td style="vertical-align: middle;width: 230px">
						 					
						 				
						 							<form action="{{ route('ShoppingCardUpdate') }}" method="post" accept-charset="utf-8">
						 								@csrf
						 								<input type="hidden" value="{{ $c->rowId }}" name="rowId">
						 							<input  type="number" class="bg-warning" value="{{ $c->qty }}" name="qty_update" min="1" id="qty_update" style="max-width: 60px;font-weight: bold;padding: 6px;">
						 						<button style="" type="submit" class="btn btn-silver">Update</button>
						 						{{-- <input type="submit" value="Update" name="Update"> --}}
						 							</form>
						 						



						 				</td>
						 				<td style="vertical-align: middle;">${{ $c->price }}</td>
						 				<td style="vertical-align: middle;">${{ $c->subtotal }}</td>
						 				<td style="vertical-align: middle;">
						 					<a href="{{ route('ShoppingCardDelete',$c->rowId) }}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
						 				</td>
						 			</tr>

						 			@endforeach
						 		</tbody>
						 	</table>

						 	<hr>

						 	<table class="table table-bordered">
						 		<thead>
						 			<tr class="bg-warning">
						 				<th>Total Ammount ($)</th>
						 				<td>{{ Cart::subtotal() }}</td>
						 			</tr>

						 			<tr class="bg-warning">
						 				<th>Discount ($)</th>
						 				<td>{{ Cart::discount() }}</td>
						 			</tr>

						 			<tr class="bg-warning">
						 				<th>Vat ($)</th>
						 				<td>{{ Cart::tax() }}</td>
						 			</tr>

						 			<tr class="bg-primary">
						 				<th style="color:white">Grand Total ($)</th>
						 				<td style="color:white">{{ Cart::total() }}</td>
						 			</tr>


						 		</thead>
						 		
						 	</table>
					<div class="row">
						 <div class="col-md-12">
						 	<a href="{{ route('/newshop') }}" class="btn btn-warning btn-middle pull-left">Continue Shopping</a>

						 	
						 	@if(Session::get('customer_id') && Session::get('shipping_id'))
						 	<a href="{{ route('Payment') }}" class="btn btn-success btn-middle pull-right">Chekout</a>

						 	@elseif(Session::get('customer_id'))

						 	<a href="{{ route('ShippingForm') }}" class="btn btn-success btn-middle pull-right">Chekout</a>

						 	@else
						 	<a href="{{ route('CheckOut') }}" class="btn btn-success btn-middle pull-right">Chekout</a>
						 	@endif

						 </div>
					</div>
						 </div>
					</div>

							
				</div>
			</div>
	<!-- checkout -->	
		</div>
@endsection







@section('footer')
<script type="text/javascript">
	
	@if(Session::has('message'))
      var type = "{{ Session::get('alert-type','success') }}";
      switch(type){
      	case "success":
      	toastr.success("{{ Session::get('message') }}");
      	break;

      	case "error":
      	toastr.error("{{ Session::get('message') }}");
      	break;
      }
	@else

	@endif
</script>

@endsection
