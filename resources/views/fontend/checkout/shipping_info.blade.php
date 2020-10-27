
@extends('fontend/master')

@section('content')

		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Shipping</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="cart-items">
				<div class="container">

					<div class="form-row">
						 <div class="form-group col-md-12 text-success well" style="font-size: 20px;text-align: center;">
                              Dear {{ Session::get('customer_name') }} You Have To Give Us Porduct Shipping Info To Complete Your Valuable Order. If Your Billing Info And Shipping Info Are Same Then Jues Press On Save Info Button
						</div> 	
						</div>

					<hr>	 	
					 
					<div class="form-row">
						 <div class="form-group col-md-8 col-md-offset-2 well">

                        <h3 class="text-center">Shipping Info Goes Here!!</h3>
                         <br>

                         <form action="{{ route('Shippingpost') }}" method="Post" accept-charset="utf-8">
                         	@csrf
                         	 <div class="form-group">
                         	 	<input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{ $customer->fname.' '.$customer->lname }}" name="name" id="name" placeholder="Enter Your First Name....">

                         	 	@error('name')
                                <span style="color:red" class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                                </span>
                         	 	@enderror
                         	 </div>

                         	

                         	 <div class="form-group">
                         	 	<input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email" value="{{ $customer->email }}" placeholder="Enter Your Email Address....">

                         	 	@error('email')
                                <span style="color:red" class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                                </span>
                         	 	@enderror
                         	 </div>

                         	 <div class="form-group">
                         	 	<input type="text" class="form-control form-control-sm @error('mobile') is-invalid @enderror" name="mobile" id="mobile" value="{{ $customer->mobile }}" placeholder="++800000-454453....">

                         	 		@error('mobile')
                                <span style="color:red" class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                                </span>
                         	 	@enderror
                         	 </div>


                         	 <div class="form-group">
                         	 	<textarea class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" id="address" placeholder="Enter Address">{{ $customer->address }}</textarea>
                         	 		@error('address')
                                <span style="color:red" class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                                </span>
                                @enderror
                         	 </div>
                            

                             <div class="form-group">
                         	 	<button  type="submit" class="form-control form-control-sm btn btn-primary btn-sm">Save Info</button>
                         	 </div>

                         </form>
                          
						 
				
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
