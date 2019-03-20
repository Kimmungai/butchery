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
              <li >
                <a class="nav-stylehead" href="/home">Home

                </a>
              </li>
              <li class="active">
                <a class="nav-stylehead" href="/shop">Shop</a>
                <span class="sr-only">(current)</span>
              </li>

              @foreach( $currentSupermarket as $supermarket )
                @foreach( $supermarket->department as $department )
                  <?php $x = 1; $i = 1;?>
                  <li class="dropdown" >
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
                                  <a href="/product-category/{{$category->id}}">{{$category->name}}</a>
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
                                  <a href="/product-category/{{$category->id}}">{{$category->name}}</a>
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
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>@if( isset($productCategory) ){{$productCategory->name}} @else Shop @endif</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">@if( isset($productCategory) ){{$productCategory->name}} @else Shop @endif
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
				<div class="left-side">
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
				</div>
				<!-- //food preference -->

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
			<div class="agileinfo-ads-display col-md-9 w3l-rightpro">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1">

            @foreach( $currentSupermarket as $supermarket )
              @foreach( $supermarket->product as $product )

    						<div class="col-xs-4 product-men">
    							<div class="men-pro-item simpleCart_shelfItem">
    								<div class="men-thumb-item">
    									<img src="{{$product->img1}}" alt="{{$product->name}}" height="150" width="160">
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
    												<input type="hidden" name="item_name" value="Zeeba Basmati Rice - 5 KG" />
    												<input type="hidden" name="amount" value="950.00" />
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
              @endforeach
            @endforeach

						<div class="clearfix"></div>
					</div>
					<!-- //first section -->

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
