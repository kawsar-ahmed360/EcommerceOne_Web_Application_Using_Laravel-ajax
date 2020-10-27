
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
					 <h3 class="text-center text-success well" style="font-size: 22px">You Have To Login To Complete Your Valuable Order . If You Are Not Registared Than Please Register First.</h3>
					 <hr>
					<div class="form-row">
						 <div class="form-group col-md-5 col-md-offset-1 well">

                        <h3>Register If You Are Not Register Before!!</h3>
                         <br>

                         <form action="{{ route('CustoRegister') }}" method="Post" accept-charset="utf-8">
                         	@csrf
                         	 <div class="form-group">
                         	 	<input type="text" class="form-control form-control-sm @error('fname') is-invalid @enderror" name="fname" id="fname" placeholder="Enter Your First Name....">

                         	 	@error('fname')
                                <span style="color:red" class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                                </span>
                         	 	@enderror
                         	 </div>

                         	 <div class="form-group">
                         	 	<input type="text" class="form-control form-control-sm @error('lname') is-invalid @enderror" name="lname" id="lname" placeholder="Enter Your last Name....">
                         	 	@error('lname')
                                <span style="color:red" class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                                </span>
                         	 	@enderror
                         	 </div>

                         	 <div class="form-group">
                         	 	<input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Your Email Address....">

                         	 	@error('email')
                                <span style="color:red" class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                                </span>
                         	 	@enderror
                         	 </div>

                         	 <div class="form-group">
                         	 	<input type="text" class="form-control form-control-sm @error('mobile') is-invalid @enderror" name="mobile" id="mobile" placeholder="++800000-454453....">

                         	 		@error('mobile')
                                <span style="color:red" class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                                </span>
                         	 	@enderror
                         	 </div>


                         	 <div class="form-group">
                         	 	<input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Your passworde....">

                         	 		@error('password')
                                <span style="color:red" class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                                </span>
                         	 	@enderror
                         	 </div>

                         	 <div class="form-group">
                         	 	<textarea class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" id="address" placeholder="Enter Address"></textarea>
                         	 		@error('address')
                                <span style="color:red" class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                                </span>
                                @enderror
                         	 </div>
                            

                             <div class="form-group">
                         	 	<button  type="submit" class="form-control form-control-sm btn btn-primary btn-sm">Registered</button>
                         	 </div>

                         </form>
                          
						 
				
						 </div>

						 	 <div class="form-group col-md-5 well" style="margin-left: 30px">

                        <h3>Alerady Register? Plese Login Here!!</h3>
                         <br>

                         <form action="{{ route('CustoLogin') }}" method="post" accept-charset="utf-8">
                         	@csrf
                         	 <div class="form-group">
                         	 	<input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="Enter Your email....">
                         	 </div>

                         	 <div class="form-group">
                         	 	<input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Enter Your password....">
                         	 </div>

                         	  <div class="form-group">
                         	 	<button class="form-control form-control-sm btn btn-success btn-sm" type="submit">Login Here</button>
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
