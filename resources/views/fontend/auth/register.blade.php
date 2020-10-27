@extends('fontend/master')

@section('content')

		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Registered</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
				<!--login-->
	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<form action="{{ route('CustoRegister') }}" method="post">

						@csrf
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text"  name="fname" placeholder="Enter Your fname....">
							<div class="clearfix"></div>
						</div>

						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" name="lname" placeholder="Enter Your lname....">
							<div class="clearfix"></div>
						</div>

						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" name="email"  placeholder="Enter Your email....">
							<div class="clearfix"></div>
						</div>

						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" name="mobile"  placeholder="Enter Your mobile....">
							<div class="clearfix"></div>
						</div>


						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password"  name="password"  placeholder="Enter Your password....">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="Confirm Password" placeholder="Enter Your password....">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Submit">
					</form>
				</div>
				
			</div>
		</div>
				<!--login-->
		</div>
		<!--content-->

@endsection