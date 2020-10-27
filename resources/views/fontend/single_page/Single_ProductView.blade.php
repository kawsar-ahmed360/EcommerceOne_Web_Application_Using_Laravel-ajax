@extends('fontend/master')

@section('content')

 		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Single</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<!--single-->
			<div class="single-wl3">
				<div class="container">
					<div class="single-grids">
						<div class="col-md-9 single-grid">
							<div clas="single-top">
								<div class="single-left">
									<div class="flexslider">
										<ul class="slides">

											@foreach(App\backend\productgallerys::where('product_id',$single->id)->get() as $ga)
											<li data-thumb="{{ url('backend/Gallery/'.$ga->product_gallery) }}">
												<div class="thumb-image"> <img src="{{ url('backend/Gallery/'.$ga->product_gallery) }}" data-imagezoom="true" class="img-responsive"> </div>
											</li>
											<li data-thumb="{{ url('backend/Gallery/'.$ga->product_gallery) }}">
												 <div class="thumb-image"> <img src="{{ url('backend/Gallery/'.$ga->product_gallery) }}" data-imagezoom="true" class="img-responsive"> </div>
											</li>
											<li data-thumb="{{ url('backend/Gallery/'.$ga->product_gallery) }}">
											   <div class="thumb-image"> <img src="{{ url('backend/Gallery/'.$ga->product_gallery) }}" data-imagezoom="true" class="img-responsive"> </div>
											</li>

											@endforeach


										 </ul>
									</div>
								</div>
								<div class="single-right simpleCart_shelfItem">
									<h4>{{ $single->product_name }}</h4>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<p class="price item_price">$ {{ $single->price }}</p>
									<div class="description">
										<p style="text-align: justify;"><span>Quick Overview : </span> {{ $single->summary }}</p>
									</div>
									<div class="color-quality">
										<form action="{{ route('ShoppingCard') }}" method="post" accept-charset="utf-8">
											@csrf

											<input type="hidden" value="{{ $single->id }}" name="product_id" id="product_id"> 
											
										
										<h6>Quality :</h6>
											<div class="quantity"> 
												                         
												 <input type="number" style="width: 130px;font-weight: bold" class="form-control form-control-sm" name="qty" value="1" min="1" id="qty">
												
											</div>
												
									</div>
									<div class="women">
                                        
                                        <span class="color">    
										<h4 style="font-size: 18px;">Select Color :</h4>
                                            <select class="form-control form-control-sm @error('color_id') is-invalid @enderror" name="color_id" id="color_id">
                                            	<option disabled="" selected="">---Select Color---</option>
                                            	@foreach(App\backend\productcolors::where('product_id',$single->id)->get() as $color)
                                                 <option value="{{ $color->color_id }}">{{ $color->colormanages['color_name'] }}</option>
                                            	@endforeach
                                            </select>

                                            @error('color_id')
                                              <span style="color:red" class="invalid-feedback" role="alert">
                                              	<strong style="color:red">{{ $message }}</strong>
                                              </span>
                                            @enderror 
										</span>

										<span class="size">    
										<h4 style="font-size: 18px;">Select Size :</h4>
                                            <select class="form-control form-control-sm @error('size_id') is-invalid @enderror" name="size_id" id="size_id">
                                            	<option disabled="" selected="">---Select Size---</option>
                                            	@foreach(App\backend\productsizes::where('product_id',$single->id)->get() as $size)
                                                 <option value="{{ $size->size_id }}">{{ $size->sizes['size_name'] }}</option>
                                            	@endforeach
                                            </select> 
                                             @error('size_id')
                                              <span style="color:red" class="invalid-feedback" role="alert">
                                              	<strong style="color:red">{{ $message }}</strong>
                                              </span>
                                            @enderror 
										</span>
										<button type="submit" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</button>
									</div>
									</form>
									<div class="social-icon">
										<a href="#"><i class="icon"></i></a>
										<a href="#"><i class="icon1"></i></a>
										<a href="#"><i class="icon2"></i></a>
										<a href="#"><i class="icon3"></i></a>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>


						<div class="col-md-3 single-grid1">
							<h3 style="font-size: 2.2em;">Recent Products</h3>

                     @foreach(App\backend\products::OrderBy('id','desc')->get()->take(5) as $pr)
							<div class="recent-grids">
								<div class="recent-left">
									<a href="single.html"><img class="img-responsive " src="{{ url('backend/product_image/'.$pr->image) }}" alt=""></a>	
								</div>
								<div class="recent-right">
									<h6 class="best2"><a href="{{ route('SingleProductView',$pr->slug) }}">{{ $pr->product_name }} </a></h6>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<span class=" price-in1"> $ {{ $pr->price }}</span>
								</div>	
								<div class="clearfix"> </div>
							</div>

					@endforeach		

						

						</div>
						<div class="clearfix"> </div>
					</div>


					<!--Product Description-->
						<div class="product-w3agile">
							<h3 class="tittle1">Product Description</h3>
							<div class="product-grids">


								<div class="col-md-4 product-grid">
										<h2 style="text-align: center;margin-left: 5px;color:blue">Related Product</h2>
									<div id="owl-demo" class="owl-carousel">
										<div class="item">

                                          @foreach(App\backend\products::where('subcategory_id',$single->subcategory_id)->get() as $sub)
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="{{ asset('backend/product_image/'.$sub->image) }}" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">{{ $sub->product_name }} </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ {{ $sub->price }}</span>
												</div>	
												<div class="clearfix"> </div>
											</div>

											@endforeach
											
										</div>


										<div class="item">

											@foreach(App\backend\products::where('subcategory_id',$single->subcategory_id)->get() as $sub)
											<div class="recent-grids">
												<div class="recent-left">
													<a href="single.html"><img class="img-responsive " src="{{ asset('backend/product_image/'.$sub->image) }}" alt=""></a>	
												</div>
												<div class="recent-right">
													<h6 class="best2"><a href="single.html">{{ $sub->product_name }} </a></h6>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<span class=" price-in1"> $ {{ $sub->price }}</span>
												</div>	
												<div class="clearfix"> </div>
											</div>

											@endforeach
											

										</div>
									</div>
									<img class="img-responsive " src="{{ asset('fontend/images/woo2.jpg') }}" alt="">
								</div>

								<div class="col-md-8 product-grid1">
									<div class="tab-wl3">
										<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
											<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
												<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
												<li role="presentation"><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Reviews (1)</a></li>

											</ul>
											<div id="myTabContent" class="tab-content">
												<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
													<div class="descr">
														<h4>Suspendisse laoreet, augue vel mattis </h4>
														<p>{{ $single->description }}</p>
															<div class="video">
															<iframe src="https://player.vimeo.com/video/22158502" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
															</div>
														<ul>
															<li> Twin button front fastening</li>
															<li> Length:65cm</li>
															<li> Regular fit</li>
															<li> Notched lapels</li>
															<li> Internal pockets</li>
															<li> Centre-back vent </li>
															<li> Material : Outer: 40% Linen &amp; 40% Polyamide; Body Lining: 100% Cotton; Lining: 100% Acetate</li>
														</ul>
														<p class="quote">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>

													</div>
												</div>
												<div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
													<div class="descr">
														<div class="reviews-top">
															<div class="reviews-left">
																<img src="{{ asset('fontend/images/men3.jpg') }}" alt=" " class="img-responsive">
															</div>
															<div class="reviews-right">
																<ul>
																	<li><a href="#">Admin</a></li>
																	<li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i>Reply</a></li>
																</ul>
																<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.</p>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="reviews-bottom">
															<h4>Add Reviews</h4>
															<p>Your email address will not be published. Required fields are marked *</p>
															<p>Your Rating</p>
															<div class="block">
																<div class="starbox small ghosting"><div class="positioner"><div class="stars"><div class="ghost" style="width: 42.5px; display: none;"></div><div class="colorbar" style="width: 42.5px;"></div><div class="star_holder"><div class="star star-0"></div><div class="star star-1"></div><div class="star star-2"></div><div class="star star-3"></div><div class="star star-4"></div></div></div></div></div>
															</div>
															<form action="#" method="post">
																<label>Your Review </label>
																<textarea type="text" Name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
																<div class="row">
																	<div class="col-md-6 row-grid">
																		<label>Name</label>
																		<input type="text" value="Name" Name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
																	</div>
																	<div class="col-md-6 row-grid">
																		<label>Email</label>
																		<input type="email" value="Email" Name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
																	</div>
																	<div class="clearfix"></div>
																</div>
																<input type="submit" value="SEND">
															</form>
														</div>
													</div>
												</div>
												<div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab">
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					<!--Product Description-->
				</div>
			</div>
			<!--single-->
			<div class="new-arrivals-w3agile">
					<div class="container">
						<h3 class="tittle1">Best Sellers</h3>
						<div class="arrivals-grids">
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="images/p28.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="images/p27.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="images/p30.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="images/p29.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben2">
										<p>OUT OF STOCK</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="images/s2.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="images/s1.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="single.html">
												<div class="grid-img">
													<img  src="images/s4.jpg" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="images/s3.jpg" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--new-arrivals-->
		</div>
		<!--content-->

@endsection

@section('footer')


