@extends('layouts.single')

@section('content')
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="{{url('/home')}}">Home</a>
						<i>|</i>
					</li>
					<li>{{$product->name}}</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">{{$product->name}}
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="col-md-5 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="{{$product->img1}}" >
								<div class="thumb-image">
									<img src="{{$product->img1}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
							<li data-thumb="{{$product->img2}}" >
								<div class="thumb-image">
									<img src="{{$product->img2}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
							<li data-thumb="{{$product->img3}}" >
								<div class="thumb-image">
									<img src="{{$product->img3}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h3>{{$product->name}}</h3>
				<!--<div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked="">
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
				</div>-->
				<p>
					<span class="item_price">Ksh. {{$product->salePrice}}</span>
					<del>Ksh. {{$product->regularPrice}}</del>
					<!--<label>Free delivery</label>-->
				</p>
				<div class="single-infoagile">
					<ul>
						<li>
							Shop here and pick up at the supermarket
						</li>
						<li>
							{{$product->excerpt}}
						</li>
						<li>
							{{$product->purchaseNote}}
						</li>
						<!--<li>
							1 offer from
							<span class="item_price">$950.00</span>
						</li>-->
					</ul>
				</div>
				<div class="product-single-w3l">
					<p>
            @if( $product->vegetarian == 1 )
  						<i class="fa fa-hand-o-right" aria-hidden="true"></i>This is a
  						<label>Vegetarian</label> product.
            @endif
					</p>
					<ul>
						<li>
							{{$product->description}}
						</li>
						<!--<li>
							After cooking, Zeeba Basmati rice grains attain an extra ordinary length of upto 2.4 cm/~1 inch.
						</li>
						<li>
							Zeeba Basmati rice adheres to the highest food afety standards as your health is paramount to us.
						</li>
						<li>
							Contains only the best and purest grade of basmati rice grain of Export quality.
						</li>-->
					</ul>
					<!--<p>
						<i class="fa fa-refresh" aria-hidden="true"></i>All food products are
						<label>non-returnable.</label>
					</p>-->
				</div>
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<!--<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="{{$product->name}}" />
								<input type="hidden" name="amount" value="{{$product->salePrice}}" />
								<input type="hidden" name="discount_amount" value="0.00" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="return" value=" " />
								<input type="hidden" name="cancel_return" value=" " />
								<input id="product-{{$product->id}}-id" type="hidden" name="id" value="{{$product->id}}">
								<input id="product-{{$product->id}}-quantity" type="hidden" name="quantity" min="1" value="1">
								<input id="product-{{$product->id}}" type="submit" name="submit" value="Add to cart" class="button" onclick="add_to_cart(this.id)" />
							</fieldset>
						</form>-->
						<input id="product-{{$product->id}}-id" type="hidden" name="id" value="{{$product->id}}">
						<input id="product-{{$product->id}}-quantity" type="hidden" name="quantity" min="1" value="1">
						<input id="product-{{$product->id}}" type="submit" name="submit" value="Add to cart" class="button" data-toggle="modal" data-target="#myModal" onclick="add_to_cart(this.id)" />

					</div>

				</div>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //Single Page -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Add More
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
          @foreach( $supermarket->product as $supProduct )
            @if( ($supProduct->category_id == $product->category_id) &&  ($supProduct->id != $product->id) )
    					<li>
    						<div class="w3l-specilamk">
    							<div class="speioffer-agile">
    								<a href="/single-product/{{$supProduct->id}}">
    									<img src="{{$supProduct->img1}}" width="109" height="150" alt="{{$supProduct->name}}">
    								</a>
    							</div>
    							<div class="product-name-w3l">
    								<h4>
    									<a href="/single-product/{{$supProduct->id}}">{{$supProduct->name}}</a>
    								</h4>
    								<div class="w3l-pricehkj">
    									<h6>Ksh. {{$supProduct->salePrice}}</h6>
    									<p>Save Ksh. {{ $supProduct->regularPrice - $supProduct->salePrice}}</p>
    								</div>
    								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											<!--<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="{{$product->name}}" />
													<input type="hidden" name="amount" value="{{$product->salePrice}}" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input id="product-{{$product->id}}-id" type="hidden" name="id" value="{{$product->id}}">
													<input id="product-{{$product->id}}-quantity" type="hidden" name="quantity" min="1" value="1">
													<input id="product-{{$product->id}}" type="submit" name="submit" value="Add to cart" class="button" onclick="add_to_cart(this.id)" />
												</fieldset>
											</form>-->
											<input id="product-{{$product->id}}-id" type="hidden" name="id" value="{{$product->id}}">
											<input id="product-{{$product->id}}-quantity" type="hidden" name="quantity" min="1" value="1">
											<input id="product-{{$product->id}}" type="submit" name="submit" value="Add to cart" class="button" data-toggle="modal" data-target="#myModal" onclick="add_to_cart(this.id)" />

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
