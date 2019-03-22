@extends('layouts.front-end')

@section('content')
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<div class="agileits-navi_search">
				<form action="#" method="post">
					<select id="agileinfo-nav_search" name="agileinfo_search" required="">
						<option value="">All Categories</option>
						<option value="Kitchen">Kitchen</option>
						<option value="Household">Household</option>
						<option value="Snacks &amp; Beverages">Snacks & Beverages</option>
						<option value="Personal Care">Personal Care</option>
						<option value="Gift Hampers">Gift Hampers</option>
						<option value="Fruits &amp; Vegetables">Fruits & Vegetables</option>
						<option value="Baby Care">Baby Care</option>
						<option value="Soft Drinks &amp; Juices">Soft Drinks & Juices</option>
						<option value="Frozen Food">Frozen Food</option>
						<option value="Bread &amp; Bakery">Bread & Bakery</option>
						<option value="Sweets">Sweets</option>
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
								<li>
									<a class="nav-stylehead" href="index.html">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="about.html">About Us</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kitchen
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product.html">Bakery</a>
													</li>
													<li>
														<a href="product.html">Baking Supplies</a>
													</li>
													<li>
														<a href="product.html">Coffee, Tea & Beverages</a>
													</li>
													<li>
														<a href="product.html">Dried Fruits, Nuts</a>
													</li>
													<li>
														<a href="product.html">Sweets, Chocolate</a>
													</li>
													<li>
														<a href="product.html">Spices & Masalas</a>
													</li>
													<li>
														<a href="product.html">Jams, Honey & Spreads</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product.html">Pickles</a>
													</li>
													<li>
														<a href="product.html">Pasta & Noodles</a>
													</li>
													<li>
														<a href="product.html">Rice, Flour & Pulses</a>
													</li>
													<li>
														<a href="product.html">Sauces & Cooking Pastes</a>
													</li>
													<li>
														<a href="product.html">Snack Foods</a>
													</li>
													<li>
														<a href="product.html">Oils, Vinegars</a>
													</li>
													<li>
														<a href="product.html">Meat, Poultry & Seafood</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<img src="images/nav.png" alt="">
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Household
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-6 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product2.html">Kitchen & Dining</a>
													</li>
													<li>
														<a href="product2.html">Detergents</a>
													</li>
													<li>
														<a href="product2.html">Utensil Cleaners</a>
													</li>
													<li>
														<a href="product2.html">Floor & Other Cleaners</a>
													</li>
													<li>
														<a href="product2.html">Disposables, Garbage Bag</a>
													</li>
													<li>
														<a href="product2.html">Repellents & Fresheners</a>
													</li>
													<li>
														<a href="product2.html"> Dishwash</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-6 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product2.html">Pet Care</a>
													</li>
													<li>
														<a href="product2.html">Cleaning Accessories</a>
													</li>
													<li>
														<a href="product2.html">Pooja Needs</a>
													</li>
													<li>
														<a href="product2.html">Crackers</a>
													</li>
													<li>
														<a href="product2.html">Festive Decoratives</a>
													</li>
													<li>
														<a href="product2.html">Plasticware</a>
													</li>
													<li>
														<a href="product2.html">Home Care</a>
													</li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li class="">
									<a class="nav-stylehead" href="faqs.html">Faqs</a>
								</li>
								<li class="dropdown">
									<a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">Pages
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu agile_short_dropdown">
										<li>
											<a href="icons.html">Web Icons</a>
										</li>
										<li>
											<a href="typography.html">Typography</a>
										</li>
									</ul>
								</li>
								<li>
									<a class="" href="contact.html">Contact</a>
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
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Checkout
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
      @if( session('shoppingCart') != null )
			<div class="checkout-right">

  				<h4>Your shopping cart contains:
  					<span>{{count(session('shoppingCart'))}} Item(s)</span>
  				</h4>

				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Product Name</th>

								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
              <?php $count = 1; ?>
              @foreach( session('shoppingCart') as $item )
  							<tr class="rem{{$count}}" id="rem{{$count}}">
  								<td class="invert">{{$count}}</td>
  								<td class="invert-image">
  									<a href="/single-product/{{$item['product_id']}}">
  										<img src="{{$item['image']}}" alt="{{$item['item']}}" class="img-responsive" width="100" height="70">
  									</a>
  								</td>
  								<td class="invert">
  									<div class="quantity">
  										<div class="quantity-select">
                        <input type="number" min="1" class="form-control input-sm" value="{{$item['quantity']}}">
  											<!--<div class="entry value-minus">&nbsp;</div>
  											<div class="entry value">
  												<span>1</span>
  											</div>
  											<div class="entry value-plus active">&nbsp;</div>-->
  										</div>
  									</div>
  								</td>
  								<td class="invert">{{$item['item']}}</td>
  								<td class="invert">Ksh. {{$item['total']}}</td>
  								<td class="invert">
  									<div  class="rem" onclick="hideElement('rem{{$count}}');remove_from_cart({{$item['product_id']}})">
  										<div class="close1"> </div>
  									</div>
  								</td>
  							</tr>
                <?php $count++; ?>
              @endforeach

							<!--<tr class="rem2">
								<td class="invert">2</td>
								<td class="invert-image">
									<a href="single2.html">
										<img src="images/s6.jpg" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value">
												<span>1</span>
											</div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">Fair & Lovely, 80 g</td>
								<td class="invert">$121.60</td>
								<td class="invert">
									<div class="rem">
										<div class="close2"> </div>
									</div>
								</td>
							</tr>-->
							<!--<tr class="rem3">
								<td class="invert">3</td>
								<td class="invert-image">
									<a href="single.html">
										<img src="images/s5.jpg" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value">
												<span>1</span>
											</div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">Sprite, 2.25L (Pack of 2)</td>
								<td class="invert">$180.00</td>
								<td class="invert">
									<div class="rem">
										<div class="close3"> </div>
									</div>
								</td>
							</tr>-->
						</tbody>
					</table>
				</div>
			</div>
      @endif
			<div class="checkout-left">
				<div class="address_form_agile">

					<form id="new-order-form" class="" action="{{url('/new-order')}}" method="post" onsubmit="prevent_multiple_submit(this.id)">
            {{csrf_field()}}
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">

                  <h4>Personal Information</h4>

									<div class="controls">
										<input type="text" name="firstName" value="@if (old('firstName')) {{old('firstName')}} @elseif (Auth::user() && Auth::user()->firstName != '' ) {{Auth::user()->firstName }}  @endif" placeholder="firstName" required>
                    @if ($errors->has('firstName'))
                        <span  role="alert">
                            <strong>{{ $errors->first('firstName') }}</strong>
                        </span>
                    @endif
									</div>

                  <div class="controls">
                    <input type="text" name="lastName" value="@if (old('lastName')) {{old('lastName')}} @elseif (Auth::user() && Auth::user()->lastName != '') {{Auth::user()->lastName}}  @endif" placeholder="lastName" required>
                    @if ($errors->has('lastName'))
                        <span  role="alert">
                            <strong>{{ $errors->first('lastName') }}</strong>
                        </span>
                    @endif
									</div>

                  <div class="controls">
                    <input type="email" name="email" value="@if (old('email')) {{old('email')}} @elseif (Auth::user() && Auth::user()->email != '') {{Auth::user()->email}}  @endif" placeholder="email" required>
                    @if ($errors->has('email'))
                        <span  role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
									</div>

                  <div class="controls">
                    <input type="text" name="phoneNumber" value="@if (old('phoneNumber')) {{old('phoneNumber')}} @elseif (Auth::user() && Auth::user()->phoneNumber != '') {{Auth::user()->phoneNumber}}  @endif" placeholder="phoneNumber" required>
                    @if ($errors->has('phoneNumber'))
                        <span  role="alert">
                            <strong>{{ $errors->first('phoneNumber') }}</strong>
                        </span>
                    @endif
									</div>

                  <div class="controls">
                    <input type="text" name="address" value="@if (old('address')) {{old('address')}} @elseif (Auth::user() && Auth::user()->address != '') {{Auth::user()->address}}  @endif" placeholder="address" required>
                    @if ($errors->has('address'))
                        <span  role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
									</div>

                  <h4>Order Details</h4>

                  <div class="controls">
                    <div><label for="collectOn">Collect Date</label></div>
                    <input type="date" name="collectOn" value="{{old('collectOn')}}" placeholder="Collect on" required>
                    @if ($errors->has('collectOn'))
                        <span  role="alert">
                            <strong>{{ $errors->first('collectOn') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="controls">
                    <div><label for="collectOn">Collect Time</label></div>
                    12:00~1:00<input type="radio" name="collectTime" value="0" @if(old('collectTime')==0) checked @endif required>
                    13:00~2:00<input type="radio" name="collectTime" value="1" @if(old('collectTime')==1) checked @endif required>
                    @if ($errors->has('collectTime'))
                        <span  role="alert">
                            <strong>{{ $errors->first('collectTime') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="controls">
                    <div><label for="collectOn">Collect Location</label></div>
                    <select  name="collectAt">
                      @foreach ($supermarkets as $supermarket)
                        @if ($supermarket->id == session('selectedSupermarket'))
                          <option>{{$supermarket->name}}</option>
                          <?php break;?>
                        @endif
                      @endforeach

                    </select>
                  </div>

                  <div class="controls">
                    <div><label for="collectOn">Instructions</label></div>
                    <textarea name="description" rows="8" cols="80" placeholder="Special instructions...">{{old('collectAt')}}</textarea>
                    @if ($errors->has('description'))
                        <span  role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                  </div>
                  <h4>payment method</h4>
                  <div class="controls">
                    mpesa: <input type="radio" name="method" value="1" @if(old('method')==1) checked @endif required>
                    @if ($errors->has('method'))
                        <span  role="alert">
                            <strong>{{ $errors->first('method') }}</strong>
                        </span>
                    @endif
                  </div>

								</div>
								<button id="new-order-form-btn" type="submit" name="button" class="submit check_out">Make a payment <span class="fa fa-hand-o-right" aria-hidden="true"></span></button>
							</div>
						</div>
					</form>
					<!--<div class="checkout-right-basket">
						<a href="payment.html">Make a Payment
							<span class="fa fa-hand-o-right" aria-hidden="true"></span>
						</a>
					</div>-->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->


@endsection
