<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title')</title>
<!--css-->
<link href="{{ asset('fontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('fontend/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('fontend/css/font-awesome.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('fontend/css/jquery-ui.css') }}">
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{ asset('fontend/js/jquery.min.js') }}"></script>
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
	<script src="{{ asset('fontend/js/main.js') }}"></script>
<!--search jQuery-->
<script src="{{ asset('fontend/js/responsiveslides.min.js') }}"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
 </script>
 <!--mycart-->
<script type="text/javascript" src="{{ asset('fontend/js/bootstrap-3.1.1.min.js') }}"></script>
 <!-- cart -->
<script src="{{ asset('fontend/js/simpleCart.min.js') }}"></script>
<!-- cart -->

  <script defer src="{{ asset('fontend/js/jquery.flexslider.js') }}"></script>
<link rel="stylesheet" href="{{ asset('fontend/css/flexslider.css') }}" type="text/css" media="screen" />
<script src="{{ asset('fontend/js/imagezoom.js') }}"></script>

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>


  <!--start-rate-->
<script src="{{ asset('fontend/js/jstarbox.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('fontend/css/jstarbox.css') }}" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!--//End-rate-->
<link href="{{ asset('fontend/css/owl.carousel.css') }}" rel="stylesheet">
<script src="{{ asset('fontend/js/owl.carousel.js') }}"></script>
	<script>
		$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : false,
			navigationText :  false,
			pagination : true,
		});
		});
	</script>

	<script src="{{ asset('fontendjs/simpleCart.min.js') }}"></script>

	<link href="{{ asset('fontend/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<script src="https://js.stripe.com/v3/"></script>
</head>
<body>


	<!--header-->

         <div class="header">
			<div class="header-top">
				<div class="container">
					 <div class="top-left">
						<a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
					</div>
					<div class="top-right">
					<ul>
						<li><a href="checkout.html">Checkout</a></li>
						@if(Session::get('customer_id'))
						<li><a href="{{ route('logOut') }}" onclick="event.preventDefault();
						                                          document.getElementById('logoutform').submit();">LogOut</a></li>

						                                     <form action="{{ route('logOut') }}" method="post" id="logoutform" class="d-none" accept-charset="utf-8">
						                                          	@csrf
						                                          	
						                                          </form>     
                         @else
						<li><a href="{!! route('CheckOut') !!}">Login</a></li>
						@endif

						@if(Session::get('customer_id'))

						@else
						<li><a href="{!! route('CheckOut') !!}"> Create Account </a></li>

						@endif
					</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="index.html">New Shop <span>Shop anywhere</span></a></h1>
						</div>
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="{!! route('/newshop') !!}" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" id="women" class="dropdown-toggle" data-toggle="dropdown">Women<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="col-sm-3 multi-gd-img">
													<ul class="multi-column-dropdown">
                                                       <h6>Submenu1</h6>
														@foreach(App\backend\subcategorys::where(['category_id'=>'3','status'=>'2'])->get()->take(8) as $sub)
														<li><a href="{{ route('womentsubcategroyMatch',$sub->id) }}">{{ $sub->sub_category }}</a></li>
														@endforeach
													</ul>

												</div>
												<div class="col-sm-3  multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Submenu2</h6>
														@foreach(App\backend\subcategorys::where(['category_id'=>'3','status'=>'2'])->get()->skip(8) as $sub)
														<li><a href="{{ route('womentsubcategroyMatch',$sub->id) }}">{{ $sub->sub_category }}</a></li>
													    @endforeach
													</ul>
												</div>
												
												<div class="col-sm-3  multi-gd-img">
														<a href="products.html"><img src="{{ asset('fontend/images/woo.jpg') }}" alt=" "/></a>
												</div> 
												<div class="col-sm-3  multi-gd-img">
														<a href="products.html"><img src="{{ asset('fontend/images/woo1.jpg') }}" alt=" "/></a>
												</div>
												<div class="clearfix"></div>
											</div>
										</ul>
									</li>


									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Men <b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="col-sm-3  multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Submenu1</h6>

                                                        @foreach(App\backend\subcategorys::where(['category_id'=>'1','status'=>'2'])->get()->take(7) as $men)
														<li><a href="{!! route('MensubcategroyMatch',$men->id) !!}">{{ $men->sub_category }}</a></li>
														@endforeach
													</ul>
												</div>
												<div class="col-sm-3  multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Submenu2</h6>

														@foreach(App\backend\subcategorys::where(['category_id'=>'1','status'=>'2'])->get()->skip(7) as $men)
														<li><a href="{!! route('MensubcategroyMatch',$men->id) !!}">{{ $men->sub_category }}</a></li>
														@endforeach
													
													</ul>
												</div>
												<div class="col-sm-3  multi-gd-img">
														<a href="products1.html"><img src="{{ asset('fontend/images/woo3.jpg') }}" alt=" "/></a>
												</div> 
												<div class="col-sm-3  multi-gd-img">
														<a href="products1.html"><img src="{{ asset('fontend/images/woo4.jpg') }}" alt=" "/></a>
												</div>
												<div class="clearfix"></div>
											</div>
										</ul>
									</li>
									{{-- <li><a href="codes.html">Short Codes</a></li> --}}

									@if(Session::get('customer_id'))
                                         
									<li><a href="{!! route('Dashbord') !!}">Account</a></li>
									@else

									<li><a href="{!! route('MailUs') !!}">Mail Us</a></li>
									@endif
								</ul>
							</div>
							</nav>
						</div>
						<div class="logo-nav-right">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
							</ul> <!-- cd-header-buttons -->
							<div id="cd-search" class="cd-search">
								<form action="#" method="post">
									<input name="Search" type="search" placeholder="Search...">
								</form>
							</div>	
						</div>
						<div class="header-right2">
							<div class="cart box_1">
								<a href="checkout.html">
									<h3> <div class="total">

										@php
                                           $cart = Cart::content();
                                           $coun = count($cart);
										@endphp
										<span class="">${{ Cart::total() }}</span> (<span id="{{ $cart }}" class="{{ $cart }}"></span>{{ $coun }} items)</div>
										<img src="{{ asset('fontend/images/bag.png') }}" alt="" />
									</h3>
								</a>
								<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
								<div class="clearfix"> </div>
							</div>	
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
		<!--header-->


		@yield('content')


		<!---footer--->
					<div class="footer-w3l">
						<div class="container">
							<div class="footer-grids">
								<div class="col-md-3 footer-grid">
									<h4>About </h4>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
									<div class="social-icon">
										<a href="#"><i class="icon"></i></a>
										<a href="#"><i class="icon1"></i></a>
										<a href="#"><i class="icon2"></i></a>
										<a href="#"><i class="icon3"></i></a>
									</div>
								</div>
								<div class="col-md-3 footer-grid">
									<h4>My Account</h4>
									<ul>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="registered.html"> Create Account </a></li>
									</ul>
								</div>
								<div class="col-md-3 footer-grid">
									<h4>Information</h4>
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="products.html">Products</a></li>
										<li><a href="codes.html">Short Codes</a></li>
										<li><a href="mail.html">Mail Us</a></li>
										<li><a href="products1.html">products1</a></li>
									</ul>
								</div>
								<div class="col-md-3 footer-grid foot">
									<h4>Contacts</h4>
									<ul>
										<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a href="#">E Comertown Rd, Westby, USA</a></li>
										<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="#">1 599-033-5036</a></li>
										<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:example@mail.com"> example@mail.com</a></li>
										
									</ul>
								</div>
							<div class="clearfix"> </div>
							</div>
							
						</div>
					</div>
					<!---footer--->
					<!--copy-->
					<div class="copy-section">
						<div class="container">
							<div class="copy-left">
								<p>&copy; 2016 New Shop . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
							</div>
							<div class="copy-right">
								<img src="{{ asset('fontend/images/card.png') }}" alt=""/>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>


				<!--copy-->
				
{{-- 
........................Footer............. --}}

  <script src="{{ asset('fontend/js/toastr.min.js') }}"></script>
@yield('footer')




</body>

</html>

