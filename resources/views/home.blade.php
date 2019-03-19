@extends('layouts.front-end')

@section('content')
<!-- navigation -->
<div class="ban-top">
	<div class="container">
		<div class="agileits-navi_search">
			<form id="setSupermarketForm" action="{{url('/home')}}" method="POST">
				{{csrf_field()}}
				<select name="supermarket" onchange="submitForm('setSupermarketForm')">
					@foreach($allSupermarkets as $supermarket)
						<option value="{{$supermarket->id}}" @if($supermarket->id == session('selectedSupermarket') ) selected @endif>{{$supermarket->name}}</option>
					@endforeach
				</select>
			</form>
		</div>

		<div class="top_nav_left">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
								aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav menu__list">
							<li class="active">
								<a class="nav-stylehead" href="/home">Home
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="">
								<a class="nav-stylehead" href="/shop">Shop</a>
							</li>

							@foreach( $currentSupermarket as $supermarket )
								@foreach( $supermarket->department as $department )
									<?php $x = 1; $i = 1;?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$department->name}}
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="agile_inner_drop_nav_info">
												<div class="col-sm-4 multi-gd-img">
													<ul class="multi-column-dropdown">
														@foreach( $department->category as $category )
															@if( $x % 2 != 0 )
																<li>
																	<a href="product.html">{{$category->name}}</a>
																</li>
																<?php $x++; ?>
															@endif
														@endforeach
														<?php $count=1; ?>
													</ul>
												</div>
												<div class="col-sm-4 multi-gd-img">
													<ul class="multi-column-dropdown">
														@foreach( $department->category as $category )
															@if( $i % 2 == 0 )
																<li>
																	<a href="product.html">{{$category->name}}</a>
																</li>
																<?php $i++; ?>
															@endif
														@endforeach
													</ul>
												</div>
												<div class="col-sm-4 multi-gd-img">
													<img src="images/nav.png" alt="">
												</div>
												<div class="clearfix"></div>
											</div>
										</ul>
									</li>

									@endforeach
							@endforeach

							<li class="">
								<a class="nav-stylehead" href="faqs.html">Faqs</a>
							</li>

							<li class="">
								<a class="nav-stylehead" href="contact.html">Contact</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
</div>
<!-- //navigation -->
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Avoid
							<span>Queues</span>
						</h3>
						<p>Get flat
							<span>10%</span> Cashback</p>
						<a class="button2" href="/shop">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Healthy
							<span>Saving</span>
						</h3>
						<p>Get Upto
							<span>30%</span> Off</p>
						<a class="button2" href="/shop">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big
							<span>Deal</span>
						</h3>
						<p>Get Best Offer Upto
							<span>20%</span>
						</p>
						<a class="button2" href="/shop">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
						<h3>Today
							<span>Discount</span>
						</h3>
						<p>Get Now
							<span>40%</span> Discount</p>
						<a class="button2" href="/shop">Shop Now </a>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Our Top Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3">
				<div class="search-hotel">
					<h3 class="agileits-sear-head">Search Here..</h3>
					<form action="#" method="post">
						<input type="search" placeholder="Product name..." name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div>
				<!-- price range -->
				<div class="range">
					<h3 class="agileits-sear-head">Price range</h3>
					<ul class="dropdown-menu6">
						<li>

							<div id="slider-range"></div>
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>
					</ul>
				</div>
				<!-- //price range -->
				<!-- food preference -->
				<!--<div class="left-side">
					<h3 class="agileits-sear-head">Food Preference</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Vegetarian</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Non-Vegetarian</span>
						</li>
					</ul>
				</div>-->
				<!-- //food preference -->
				<!-- discounts -->
				<!--<div class="left-side">
					<h3 class="agileits-sear-head">Discount</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">5% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">10% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">20% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">30% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">50% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">60% or More</span>
						</li>
					</ul>
				</div>-->
				<!-- //discounts -->
				<!-- reviews -->
				<!--<div class="customer-rev left-side">
					<h3 class="agileits-sear-head">Customer Review</h3>
					<ul>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<span>5.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>4.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>3.5</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>3.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>2.5</span>
							</a>
						</li>
					</ul>
				</div>-->
				<!-- //reviews -->
				<!-- cuisine -->
				<!--<div class="left-side">
					<h3 class="agileits-sear-head">Cuisine</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">South American</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">French</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Greek</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Chinese</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Japanese</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Italian</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Mexican</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Thai</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Indian</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span"> Spanish </span>
						</li>
					</ul>
				</div>-->
				<!-- //cuisine -->
				<!-- deals -->
				<div class="deal-leftmk left-side">
					<h3 class="agileits-sear-head">Special Deals</h3>

					@foreach( $currentSupermarket as $supermarket )
						@foreach ( $supermarket->product->reverse() as $product)
							@if( $product->specialFeatured == 1 )
								<div class="special-sec1">
									<div class="col-xs-4 img-deals">
										<img src="{{$product->img1}}" height="70" width="70" alt="{{$product->name}}">
									</div>
									<div class="col-xs-8 img-deal1">
										<h3>{{$product->name}}</h3>
										<a href="/single-product/{{$product->id}}">Ksh. {{$product->salePrice}}</a>
									</div>
									<div class="clearfix"></div>
								</div>
							@endif
						@endforeach
					@endforeach


				</div>
				<!-- //deals -->
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9">
				<div class="wrapper">
					<!-- first section (nuts) -->
					<?php $count=1; ?>

					@foreach ( $currentSupermarket as $supermarket )
						@foreach( $supermarket->department as $department )

							@foreach( $department->category as $category )

								@if( $category->featured == 1  )
									 @if( $count == 1 )

									 <div class="product-sec1">
				 						<h3 class="heading-tittle text-capitalize">{{$category->name}}</h3>
										@foreach ( $supermarket->product as $product )
											@if( $product->category_id == $category->id )

						 						<div class="col-md-4 product-men">
						 							<div class="men-pro-item simpleCart_shelfItem">
						 								<div class="men-thumb-item">
						 									<img src="{{$product->img1}}" height="150" width="160" alt="{{$product->name}}">
						 									<div class="men-cart-pro">
						 										<div class="inner-men-cart-pro">
						 											<a href="/single-product/{{$product->id}}" class="link-product-add-cart">Quick View</a>
						 										</div>
						 									</div>
															@if( Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->diffInDays() <= 1 )
						 										<span class="product-new-top">New</span>
															@endif
						 								</div>
						 								<div class="item-info-product ">
						 									<h4>
						 										<a href="/single-product/{{$product->id}}">{{$product->name}}</a>
						 									</h4>
						 									<div class="info-product-price">
						 										<span class="item_price">Ksh. {{$product->salePrice}}</span>
						 										<del>Ksh. {{$product->regularPrice}}</del>
						 									</div>
						 									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						 										<form action="#" method="post">
						 											<fieldset>
						 												<input type="hidden" name="cmd" value="_cart" />
						 												<input type="hidden" name="add" value="1" />
						 												<input type="hidden" name="business" value=" " />
						 												<input type="hidden" name="item_name" value="Almonds, 100g" />
						 												<input type="hidden" name="amount" value="149.00" />
						 												<input type="hidden" name="discount_amount" value="1.00" />
						 												<input type="hidden" name="currency_code" value="USD" />
						 												<input type="hidden" name="return" value=" " />
						 												<input type="hidden" name="cancel_return" value=" " />
						 												<input type="submit" name="submit" value="Add to cart" class="button" />
						 											</fieldset>
						 										</form>
						 									</div>

						 								</div>
						 							</div>
						 						</div>
												@endif
										@endforeach

				 						<div class="clearfix"></div>
				 					</div>

									 @endif
									 <?php $count++; ?>
								@endif

							@endforeach

						@endforeach
					@endforeach

					<!-- //first section (nuts) -->
					@foreach( $currentSupermarket as $supermarket )
						@foreach( $supermarket->product as $product )
							@if( $product->specialFeatured == 1 )
								<!-- second section (nuts special) -->
								<div class="product-sec1 product-sec2">
									<div class="col-xs-7 effect-bg">
										<h3 class="">{{$product->name}}</h3>
										<h6>{{$product->excerpt}}</h6>
										<p>{{$product->purchaseNote}}</p>
									</div>
									<h3 class="w3l-nut-middle">Nuts and dry foods</h3>
									<div class="col-xs-5 bg-right-nut">
										<img src="{{$product->img1}}" height="262" width="300" alt="{{$product->name}}">
									</div>
									<div class="clearfix"></div>
								</div>
								<!-- //second section (nuts special) -->
							@endif
						@endforeach
					@endforeach


					<!-- //third section (oils) -->
					<!-- fourth section (noodles) -->
					<?php $count=1; ?>

					@foreach ( $currentSupermarket as $supermarket )
						@foreach( $supermarket->department as $department )

							@foreach( $department->category as $category )

								@if( $category->featured == 1  )
									 @if( $count != 1 )


									 <div class="product-sec1">
				 						<h3 class="heading-tittle">{{$category->name}}</h3>

										@foreach( $supermarket->product as $product )

										 @if( $product->category_id == $category->id )
						 						<div class="col-md-4 product-men">
						 							<div class="men-pro-item simpleCart_shelfItem">
						 								<div class="men-thumb-item">
						 									<img src="{{$product->img1}}" width="132" height="150" alt="{{$product->name}}">
						 									<div class="men-cart-pro">
						 										<div class="inner-men-cart-pro">
						 											<a href="/single-product/{{$product->id}}" class="link-product-add-cart">Quick View</a>
						 										</div>
						 									</div>
						 								</div>
						 								<div class="item-info-product ">
						 									<h4>
						 										<a href="/single-product/{{$product->id}}">{{$product->name}}</a>
						 									</h4>
						 									<div class="info-product-price">
						 										<span class="item_price">Ksh. {{$product->salePrice}}</span>
						 										<del>Ksh. {{$product->regularPrice}}</del>
						 									</div>
						 									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						 										<form action="#" method="post">
						 											<fieldset>
						 												<input type="hidden" name="cmd" value="_cart" />
						 												<input type="hidden" name="add" value="1" />
						 												<input type="hidden" name="business" value=" " />
						 												<input type="hidden" name="item_name" value="YiPPee Noodles, 65g" />
						 												<input type="hidden" name="amount" value="15.00" />
						 												<input type="hidden" name="discount_amount" value="1.00" />
						 												<input type="hidden" name="currency_code" value="USD" />
						 												<input type="hidden" name="return" value=" " />
						 												<input type="hidden" name="cancel_return" value=" " />
						 												<input type="submit" name="submit" value="Add to cart" class="button" />
						 											</fieldset>
						 										</form>
						 									</div>

						 								</div>
						 							</div>
						 						</div>
											@endif
										@endforeach

				 						<div class="clearfix"></div>
				 					</div>


									 @endif
									 <?php $count++; ?>
								@endif

							@endforeach

						@endforeach
					@endforeach

					<!-- //fourth section (noodles) -->
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
	<!-- //top products -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Special Offers
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
					@foreach( $currentSupermarket as $supermarket )
						@foreach( $supermarket->product as $product )
							@if( $product->specialFeatured == 1 )
								<li>
									<div class="w3l-specilamk">
										<div class="speioffer-agile">
											<a href="/single-product/{{$product->id}}">
												<img src="{{$product->img1}}" width="109" height="150" alt="{{$product->name}}">
											</a>
										</div>
										<div class="product-name-w3l">
											<h4>
												<a href="/single-product/{{$product->id}}">{{$product->name}}</a>
											</h4>
											<div class="w3l-pricehkj">
												<h6>Ksh. {{$product->salePrice}}</h6>
												<p>Save Ksh. {{$product->regularPrice - $product->salePrice}}</p>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="item_name" value="Aashirvaad, 5g" />
														<input type="hidden" name="amount" value="220.00" />
														<input type="hidden" name="discount_amount" value="1.00" />
														<input type="hidden" name="currency_code" value="USD" />
														<input type="hidden" name="return" value=" " />
														<input type="hidden" name="cancel_return" value=" " />
														<input type="submit" name="submit" value="Add to cart" class="button" />
													</fieldset>
												</form>
											</div>
										</div>
									</div>
								</li>
							 @endif
						@endforeach
					@endforeach

				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->

@endsection
