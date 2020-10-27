@extends('fontend/master')
@section('title')
 New Shop Home Page
@endsection
@section('content')



		<!--banner-->
		<div class="banner-w3">
			<div class="demo-1">            
				<div id="example1" class="core-slider core-slider__carousel example_1">
					<div class="core-slider_viewport">
						<div class="core-slider_list">
							<div class="core-slider_item">
								<img src="{{ asset('fontend/images/b1.jpg') }}" class="img-responsive" alt="">
							</div>
							 <div class="core-slider_item">
								 <img src="{{ asset('fontend/images/b2.jpg') }}" class="img-responsive" alt="">
							 </div>
							<div class="core-slider_item">
								  <img src="{{ asset('fontend/images/b3.jpg') }}" class="img-responsive" alt="">
							</div>
							<div class="core-slider_item">
								  <img src="{{ asset('fontend/images/b4.jpg') }}" class="img-responsive" alt="">
							</div>
						 </div>
					</div>
					<div class="core-slider_nav">
						<div class="core-slider_arrow core-slider_arrow__right"></div>
						<div class="core-slider_arrow core-slider_arrow__left"></div>
					</div>
					<div class="core-slider_control-nav"></div>
				</div>
			</div>
			<link href="{{ asset('fontend/css/coreSlider.css') }}" rel="stylesheet" type="text/css">
			<script src="{{ asset('fontend/js/coreSlider.js') }}"></script>
			<script>
			$('#example1').coreSlider({
			  pauseOnHover: false,
			  interval: 3000,
			  controlNavEnabled: true
			});

			</script>

		</div>	
		<!--banner-->
			<!--content-->
		<div class="content">
			<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="{{ asset('fontend/images/p1.jpg') }}" class="img-responsive" alt=""/>
								<div class="ban-text">
									<h4>Men’s Clothing</h4>
								</div>
								<div class="ban-text2 hvr-sweep-to-top">
									<h4>50% <span>Off/-</span></h4>
								</div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="{{ asset('fontend/images/p2.jpg') }}" class="img-responsive" alt=""/>
								<div class="ban-text1">
									<h4>Women's Clothing</h4>
								</div>
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="{{ asset('fontend/images/p3.jpg') }}" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>T - Shirt</h4>
										</div>
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="{{ asset('fontend/images/p4.jpg') }}" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>Hand Bag</h4>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			<!--banner-bottom-->
			<!--new-arrivals-->
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 class="tittle">New Arrivals</h2>
						<div class="arrivals-grids">

                        @foreach(App\backend\products::OrderBy('id','desc')->get()->take(8) as $pro)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr" style="margin-top: 10px;">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1{{ $pro->id }}">

												@foreach(App\backend\productgallerys::where('product_id',$pro->id)->OrderBy('product_gallery','desc')->get() as $gell)
												<div class="grid-img">
													<img  src="{{ url('backend/Gallery/'.$gell->product_gallery) }}" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{ url('backend/Gallery/'.$gell->product_gallery) }}" class="img-responsive"  alt="">
												</div>
											 @endforeach				
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
										<h6><a href="{{ route('SingleProductView',$pro->slug) }}">{{ $pro->product_name }}</a></h6>
										<span class="size">
                                          @foreach(App\backend\productsizes::where('product_id',$pro->id)->get() as $size)
                                           {{ $size->sizes['size_name'] }}/
                                          @endforeach
										 </span>
										<p ><del>$100.00</del><em class="item_price">${{ $pro->price }}</em></p>
										<a href="{{ route('SingleProductView',$pro->slug) }}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>

 
{{--   modal section --}}

<div class="modal fade" id="myModal1{{ $pro->id }}" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
							<div class="news-gr">
								<div class="col-md-5 new-grid1">
								<img src="{{ url('backend/product_image/'.$pro->image) }}" class="img-responsive" alt="">
								</div>
									<div class="col-md-7 new-grid">
										<h5>{{ $pro->product_name }}</h5>
										<h6>Quick Overview</h6>
										<span style="text-align: justify;">{{ $pro->summary }}</span>
										<div class="color-quality">
											<div class="color-quality-left">
												<h6>Color : </h6>
												<ul>
													@foreach(App\backend\productcolors::where('product_id',$pro->id)->get() as $color)
													<li><a href="#"><span></span>{{ $color->colormanages['color_name'] }}</a></li>
													@endforeach
													{{-- <li><a href="#" class="brown"><span></span>Yellow</a></li> --}}
													{{-- <li><a href="#" class="purple"><span></span>Purple</a></li>
													<li><a href="#" class="gray"><span></span>Violet</a></li> --}}
												</ul>
											</div>
											<div class="color-quality-right">
												<h6>Quality :</h6>
												<div class="quantity"> 
													<div class="quantity-select">                           
														<div class="entry value-minus1">&nbsp;</div>
														<div class="entry value1"><span>1</span></div>
														<div class="entry value-plus1 active">&nbsp;</div>
													</div>
												</div>
												<!--quantity-->
														<script>
														$('.value-plus1').on('click', function(){
															var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
															divUpd.text(newVal);
														});

														$('.value-minus1').on('click', function(){
															var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
															if(newVal>=1) divUpd.text(newVal);
														});
														</script>
													<!--quantity-->
											</div>
											<div class="clearfix"> </div>
										</div>
									<div class="women">
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price"> ${{ $pro->price }} </em></p>
										<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="images/of2.png">Add to Cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>


						
					  @endforeach		
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--new-arrivals-->
				<!--accessories-->
			<div class="accessories-w3l">
				<div class="container">
					<h3 class="tittle">20% Discount on</h3>
					<span>TRENDING DESIGNS</span>
					<div class="button">
						<a href="#" class="button1"> Shop Now</a>
						<a href="#" class="button1"> Quick View</a>
					</div>
				</div>
			</div>
			<!--accessories-->
			<!--Products-->
				<div class="product-agile">
					<div class="container">
						<h3 class="tittle1"> New Products</h3>
						<div class="slider">
							<div class="callbacks_container">
								<ul class="rslides" id="slider">
									<li>	
										<div class="caption">
                              @foreach(App\backend\products::OrderBy('id','asc')->get()->take(12) as $asccpro)	 


											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr" style="margin-top: 8px">
													<div  class="grid-arrival">
														<figure>		
															<a href="single.html">
																@foreach(App\backend\productgallerys::where('product_id',$asccpro->id)->OrderBy('product_gallery','desc')->get() as $gal)
																<div class="grid-img">
																	<img  src="{{ url('backend/Gallery/'.$gal->product_gallery) }}" class="img-responsive" alt="">
																</div>
																<div class="grid-img">
																	<img  src="{{ url('backend/Gallery/'.$gal->product_gallery) }}" class="img-responsive"  alt="">
																</div>

																@endforeach			
															</a>		
														</figure>	
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="{{ route('SingleProductView',$asccpro->slug) }}">Sed ut perspiciatis unde</a></h6>
														<span class="size">XL / XXL / S </span>
														<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
														<a href="{{ route('SingleProductView',$asccpro->slug) }}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
											</div>
											
							@endforeach			
											<div class="clearfix"></div>
										</div>


									</li>
									<li>

										<div class="caption">
									@foreach(App\backend\products::OrderBy('id','desc')->get()->take(12) as $descpro)	 
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr" style="margin-top: 8px">
													<div  class="grid-arrival">
														<figure>		
															<a href="single.html">
																@foreach(App\backend\productgallerys::where('product_id',$descpro->id)->OrderBy('product_gallery','desc')->get() as $gal)
																<div class="grid-img">
																	<img  src="{{ url('backend/Gallery/'.$gal->product_gallery) }}" class="img-responsive" alt="">
																</div>
																<div class="grid-img">
																	<img  src="{{ url('backend/Gallery/'.$gal->product_gallery) }}" class="img-responsive"  alt="">
																</div>

																@endforeach			
															</a>		
														</figure>	
													</div>
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="{{ route('SingleProductView',$descpro->slug) }}">{{ $descpro->product_name }}</a></h6>
														<span class="size">XL / XXL / S </span>
														<p ><del>$100.00</del><em class="item_price">${{ $descpro->price }}</em></p>
														<a href="{{ route('SingleProductView',$descpro->slug) }}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
													</div>
												</div>
											</div>


						
									@endforeach	
											<div class="clearfix"></div>
										</div>

									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<!--Products-->
			<div class="latest-w3">
				<div class="container">
					<h3 class="tittle1">Latest Fashion Trends</h3>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{ asset('fontend/images/l1.jpg') }}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Men</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-50%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{ asset('fontend/images/l2.jpg') }}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Shoes</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-20%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{ asset('fontend/images/l3.jpg') }}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Women</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-50%</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{ asset('fontend/images/l4.jpg') }}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Watch</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-45%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{ asset('fontend/images/l5.jpg') }}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Bag</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-10%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{ asset('fontend/images/l6.jpg') }}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Cameras</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-30%</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
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
													<img  src="{{ asset('fontend/images/p28.jpg') }}" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{ asset('fontend/images/p27.jpg') }}" class="img-responsive"  alt="">
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
													<img  src="{{ asset('fontend/images/p30.jpg') }}" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{ asset('fontend/images/p29.jpg') }}" class="img-responsive"  alt="">
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
													<img  src="{{ asset('fontend/images/s2.jpg') }}" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{ asset('fontend/images/s1.jpg') }}" class="img-responsive"  alt="">
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
													<img  src="{{ asset('fontend/images/s4.jpg') }}" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{ asset('fontend/images/s3.jpg') }}" class="img-responsive"  alt="">
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