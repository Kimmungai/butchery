<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="{{url('front-end/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{url('front-end/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{url('front-end/css/font-awesome.css')}}" rel="stylesheet">
	<!--pop-up-box-->
	<link href="{{url('front-end/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="{{url('front-end/css/jquery-ui1.css')}}">
	<!-- flexslider -->
	<link rel="stylesheet" href="{{url('front-end/css/flexslider.css')}}" type="text/css" media="screen" />
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- top-header -->
	<div class="header-most-top">
		@foreach( $currentSupermarket as $supermarket )
			@if( $supermarket->id == session('selectedSupermarket') )
				<p>{{$supermarket->tagline}}</p>
				<?php break; ?>
			@endif
		@endforeach
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="/home">
						<span>{{ config('app.name', 'Laravel') }}</span>
						<img src="{{url('front-end/images/logo2.png')}}" alt="{{ config('app.name', 'Laravel') }} " height="85" width="85">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li>
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
							<span class="fa fa-map-marker" aria-hidden="true"></span> Shop Selector</a>
					</li>
					<!--<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-truck" aria-hidden="true"></span>Track Order</a>
					</li>-->
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678
					</li>
					@if( Auth::check() )
					<li>
						<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<span class="fa fa-lock" aria-hidden="true"></span> Sign out </a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
							</form>
					</li>

					<li>
						<a href="{{url('user-profile')}}" >
							<span class="fa fa-user" aria-hidden="true"></span> {{Auth::user()->lastName}} </a>
					</li>
					@else
					<li>
						<a id="signinForm" href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
					</li>

					<li>
						<a href="#" data-toggle="modal" data-target="#myModal2">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
					</li>
					@endif

				</ul>
				<!-- //header lists -->
				<!-- search -->
				<!--<div class="agileits_search">
					<form action="#" method="post">
						<input name="Search" type="search" placeholder="How can we help you today?" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>-->
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">

							<button class="btn bg-transparent" type="button" name="submit" value="" onclick="showElement('cart-snippet')">
								<i class="fa fa-cart-arrow-down" aria-hidden="true" style="font-size:21px;"></i>
								<span id="cart-badge" class="badge badge-danger">@if(session('shoppingCart') != null ) {{count(session('shoppingCart'))}} @endif</span>
							</button>
						</form>
					</div>
				</div>
				<!-- //cart details -->

				<!--cart snippet-->
				<div id="cart-snippet" class="container" style="position:fixed;z-index:100000000000000000;bottom: 20%;left:20%;display:none;">
						<div class="row">
							<div class="col-xs-8">
								<div class="panel panel-info">
									<div class="panel-heading">
										<div class="panel-title">
											<div class="row">
												<div class="col-xs-6">
													<h5><span class="glyphicon glyphicon-shopping-cart"></span></h5>
												</div>
												<div class="col-xs-6">
													<button type="button" class="close" onclick="hideElement('cart-snippet')">
														<span class="glyphicon glyphicon-remove-sign"></span> close
													</button>
												</div>
											</div>
										</div>
									</div>
									<div class="panel-body" id="cart-contents">
										@foreach ( session('shoppingCart') as $item )
											<div  class="row">
												<div class="col-xs-2"><img class="img-responsive" src="{{$item['image']}}" width="100" height="70">
												</div>
												<div class="col-xs-4">
													<h4 class="product-name"><strong>{{$item['item']}}</strong></h4><h4><small></small></h4>
												</div>
												<div class="col-xs-6">
													<div class="col-xs-4 text-right">
														<h6><strong>{{$item['price']}} <span class="text-muted">x</span></strong></h6>
													</div>
													<div class="col-xs-4">
														<input id="product-{{$item['product_id']}}-cart-quantity" type="number" min="1" class="form-control input-sm" value="{{$item['quantity']}}" onchange="update_cart(this.value,{{$item['product_id']}})">
													</div>

													<div class="col-xs-2">
														<button type="button" class="btn btn-link btn-xs" onclick="remove_from_cart({{$item['product_id']}})">
															<span class="glyphicon glyphicon-trash"> </span>
														</button>
													</div>
												</div>
											</div>
											<hr>
										@endforeach

									</div>
									<div class="panel-footer">
										<div class="row text-center">
											<div class="col-xs-9">
												<h4 class="text-right">Total <strong id="cart-total">@if(session('shoppingCartTotal')!=null) Ksh. {{ session('shoppingCartTotal') }} @endif</strong></h4>
											</div>
											<div class="col-xs-3">
												<a  href="{{url('check-out')}}" class="btn btn-success btn-block">
													Checkout
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!--end cart snippet-->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- Button trigger modal(shop-locator) -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="select-city">
			<h3>Please Select A Shop</h3>
			<form id="setSupermarketForm" action="{{url('/home')}}" method="POST">
				{{csrf_field()}}
				<select class="list_of_cities" name="supermarket" onchange="submitForm('setSupermarketForm')">
					@foreach($allSupermarkets as $supermarket)
						<option value="{{$supermarket->id}}" @if($supermarket->id == session('selectedSupermarket') ) selected @endif>{{$supermarket->name}}</option>
					@endforeach
				</select>
			</form>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //shop locator (popup) -->
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In </h3>
						<p>
							Sign In now, Let's start your Grocery Shopping. Don't have an account?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
						</p>
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="styled-input agile-styled-input-top">
								<input class="{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" type="email" placeholder="Your Email" name="email" value="{{ old('email') }}" required autofocus>
								@if ($errors->has('email'))
										<span class="invalid-feedback text-danger" role="alert">
												<strong>{{ $errors->first('email') }}</strong>
										</span>

								@endif
							</div>
							<div class="styled-input">
								<input class="{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" placeholder="Your Password" name="password" required>
								@if ($errors->has('password'))
										<span class="invalid-feedback text-danger" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
										</span>

								@endif
							</div>
							<div class="styled-input">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
								<label class="form-check-label" for="remember">
										{{ __('Remember Me') }}
								</label>
							</div>
							<input type="submit" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the Grocery Shoppy! Let's set up your Account.
						</p>
						<form method="POST" action="{{ route('register') }}">
								@csrf

								<div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

										<div class="col-md-6">
												<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

												@if ($errors->has('name'))
														<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('name') }}</strong>
														</span>
												@endif
										</div>
								</div>

								<div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

										<div class="col-md-6">
												<input id="name" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

												@if ($errors->has('firstName'))
														<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('firstName') }}</strong>
														</span>
												@endif
										</div>
								</div>

								<div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

										<div class="col-md-6">
												<input id="name" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

												@if ($errors->has('lastName'))
														<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('lastName') }}</strong>
														</span>
												@endif
										</div>
								</div>

								<div class="form-group row">
										<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

										<div class="col-md-6">
												<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

												@if ($errors->has('email'))
														<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('email') }}</strong>
														</span>
												@endif
										</div>
								</div>

								<div class="form-group row">
										<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

										<div class="col-md-6">
												<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

												@if ($errors->has('password'))
														<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('password') }}</strong>
														</span>
												@endif
										</div>
								</div>

								<div class="form-group row">
										<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

										<div class="col-md-6">
												<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
										</div>
								</div>

								<input type="hidden" name="supermarket_id" value="@if( session('selectedSupermarket') !=''  ) {{session('selectedSupermarket')}}@else 1 @endif">

								<div class="form-group row mb-0">
										<div class="col-md-6 offset-md-4">
												<input type="submit" value="{{ __('Register') }}">


										</div>
								</div>
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->

	<!-- start add to cart modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{ config('app.name', 'Laravel') }}</h4>
        </div>
        <div class="modal-body">
					<h1 class="text-success text-center"><i class="fa fa-check-circle"></i></h1>
          <p class="text-success">
						Added to cart successfully.
					</p>
        </div>
        <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" onclick="showElement('cart-snippet')">View cart</button>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end add to cart modal-->

@if (session('message'))
		<div class="alert alert-success" role="alert">
				{{ session('message') }}
		</div>
@endif
@if (session('error'))
		<div class="alert alert-danger" role="alert">
				{{ session('error') }}
		</div>
@endif

<!-- navigation -->
<div class="ban-top">
	<div class="container">
		<!--<div class="agileits-navi_search">
			<form id="setSupermarketForm" action="{{url('/home')}}" method="POST">
				{{csrf_field()}}
				<select name="supermarket" onchange="submitForm('setSupermarketForm')">
					@foreach($allSupermarkets as $supermarket)
						<option value="{{$supermarket->id}}" @if($supermarket->id == session('selectedSupermarket') ) selected @endif>{{$supermarket->name}}</option>
					@endforeach
				</select>
			</form>
		</div>-->

		<div class="top_nav_left" style="float:left">
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
							<li class="@if( Request::is('home') ) active @endif">
								<a class="nav-stylehead" href="/home">Home
									@if( Request::is('home') )
									<span class="sr-only">(current)</span>
									@endif
								</a>
							</li>
							<li class="@if( Request::is('shop') || Request::is('check-out') || Request::is('order-payment') || Request::is('thank-you') || Request::is('single-product/*') ) active @endif">
								<a class="nav-stylehead" href="/shop">Shop</a>
								@if( Request::is('shop') || Request::is('check-out') || Request::is('order-payment') || Request::is('thank-you') || Request::is('single-product/*') || Request::is('product-category/*'))
								<span class="sr-only">(current)</span>
								@endif
							</li>

							@foreach( $currentSupermarket as $supermarket )
								@foreach( $supermarket->department as $department )
									<?php $x = 1; $i = 1;?>
									<?php $catId = substr(Request::path(), strrpos(Request::path(), '/') + 1); ?>
									<li id="department-{{$department->id}}" class="dropdown">
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

															@if( $catId == $category->id )
															<script type="text/javascript">
																var deptId = {{$department->id}};
															</script>
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

							<li class="@if( Request::is('faq') ) active @endif">
								<a class="nav-stylehead" href="{{url('/faq')}}">Faqs</a>
								@if( Request::is('faq') )
								<span class="sr-only">(current)</span>
								@endif
							</li>

							<li class="">
								<a class="nav-stylehead @if( Request::is('contact-us') ) active @endif" href="{{url('/contact-us')}}">Contact</a>
								@if( Request::is('contact-us') )
								<span class="sr-only">(current)</span>
								@endif
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
</div>
<!-- //navigation -->
  @yield('content')
  <!-- newsletter -->
  <div class="footer-top">
    <div class="container-fluid">
      <div class="col-xs-8 agile-leftmk">
        <h2>Avoid the hustle of queing in supermarkets</h2>
        <p>Reserve your shopping here and find it ready!</p>
        <form action="#" method="post">
          <input type="email" placeholder="E-mail" name="email" required="">
          <input type="submit" value="Subscribe">
        </form>
        <div class="newsform-w3l">
          <span class="fa fa-envelope-o" aria-hidden="true"></span>
        </div>
      </div>
      <div class="col-xs-4 w3l-rightmk">
        <img src="{{url('/front-end/images/tab3.png')}}" alt=" ">
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- //newsletter -->
  <!-- footer -->
  <footer>
    <div class="container">
      <!-- footer first section -->
      @foreach( $currentSupermarket as $supermarket )
       <p class="footer-main">{{$supermarket->description}}</p>
      @endforeach
      <!-- //footer first section -->
      <!-- footer second section -->
      <div class="w3l-grids-footer">
        <div class="col-xs-4 offer-footer">
          <div class="col-xs-4 icon-fot">
            <span class="fa fa-shopping-cart" aria-hidden="true"></span>
          </div>
          <div class="col-xs-8 text-form-footer">
            <h3>Place an order</h3>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="col-xs-4 offer-footer">
          <div class="col-xs-4 icon-fot">
            <span class="fa fa-refresh" aria-hidden="true"></span>
          </div>
          <div class="col-xs-8 text-form-footer">
            <h3>Select when to pick it</h3>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="col-xs-4 offer-footer">
          <div class="col-xs-4 icon-fot">
            <span class="fa fa-gift" aria-hidden="true"></span>
          </div>
          <div class="col-xs-8 text-form-footer">
            <h3>Find ready for pick up</h3>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- //footer second section -->
      <!-- footer third section -->
      <div class="footer-info w3-agileits-info">
        <!-- footer categories -->
        <div class="col-sm-5 address-right">
          <div class="col-xs-6 footer-grids">
            <h3>Categories</h3>
            <ul>

              <?php $count=0; ?>
              @foreach( $currentSupermarket as $supermarket )
                @foreach( $supermarket->department as $department )
                  @foreach( $department->category as $category )
                    @if( $count % 2 == 0 && $count < 7)
                      <li>
                        <a href="product.html">{{$category->name}}</a>
                      </li>

                    @endif
                    <?php $count++; ?>
                  @endforeach
                @endforeach
              @endforeach

            </ul>
          </div>
          <div class="col-xs-6 footer-grids agile-secomk">
            <ul>
              <?php $count=0; ?>
              @foreach( $currentSupermarket as $supermarket )
                @foreach( $supermarket->department as $department )
                  @foreach( $department->category as $category )
                    @if( $count % 2 != 0 && $count < 7)
                      <li>
                        <a href="product.html">{{$category->name}}</a>
                      </li>

                    @endif
                    <?php $count++; ?>
                  @endforeach
                @endforeach
              @endforeach
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- //footer categories -->
        <!-- quick links -->
        <div class="col-sm-5 address-right">
          <div class="col-xs-6 footer-grids">
            <h3>Quick Links</h3>
            <ul>
              <li>
                <a href="/faqs">Faqs</a>
              </li>
              <li>
                <a href="/contact-us">Contact Us</a>
              </li>
              <!--<li>
                <a href="help.html">Help</a>
              </li>
              <li>
                <a href="faqs.html">Faqs</a>
              </li>
              <li>
                <a href="terms.html">Terms of use</a>
              </li>
              <li>
                <a href="privacy.html">Privacy Policy</a>
              </li>-->
            </ul>
          </div>
          <div class="col-xs-6 footer-grids">
            <h3>Get in Touch</h3>
            <ul>
              <li>
                <i class="fa fa-map-marker"></i> Ngara, Nairobi</li>
              <li>
                <i class="fa fa-mobile"></i> 000 000 000 </li>
              <li>
                <i class="fa fa-phone"></i> +254 11 2331 </li>
              <li>
                <i class="fa fa-envelope-o"></i>
                <a href="mailto:example@mail.com"> mail@example.com</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- //quick links -->
        <!-- social icons -->
        <div class="col-sm-2 footer-grids  w3l-socialmk">
          <h3>Follow Us on</h3>
          <div class="social">
            <ul>
              <li>
                <a class="icon fb" href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a class="icon tw" href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a class="icon gp" href="#">
                  <i class="fa fa-google-plus"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="agileits_app-devices">
            <h5>Download the App</h5>
            <a href="#">
              <img src="images/1.png" alt="">
            </a>
            <a href="#">
              <img src="images/2.png" alt="">
            </a>
            <div class="clearfix"> </div>
          </div>
        </div>
        <!-- //social icons -->
        <div class="clearfix"></div>
      </div>
      <!-- //footer third section -->
      <!-- footer fourth section (text) -->
      <div class="agile-sometext">

        <!-- //brands -->
        <!-- payment -->
        <div class="sub-some child-momu">
          <h5>Payment Method</h5>
          <ul>
            <li>
              <img src="{{url('/front-end/images/pay10.png')}}" alt="">
            </li>

          </ul>
        </div>
        <!-- //payment -->
      </div>
      <!-- //footer fourth section (text) -->
    </div>
  </footer>
  <!-- //footer -->
  <!-- copyright -->
  <div class="copy-right">
    <div class="container">
      <p>
				© {{date('Y')}} {{ config('app.name', 'Laravel') }}. All rights reserved.
      </p>
    </div>
  </div>
  <!-- //copyright -->

  <!-- js-files -->
  <!-- jquery -->
  <script src="{{url('front-end/js/jquery-2.1.4.min.js')}}"></script>
  <!-- //jquery -->

  <!-- popup modal (for signin & signup)-->
  <script src="{{url('front-end/js/jquery.magnific-popup.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
      });

    });
  </script>
  <!-- Large modal -->
  <!-- <script>
    $('#').modal('show');
  </script> -->
  <!-- //popup modal (for signin & signup)-->

  <!-- cart-js -->
  <script src="{{url('front-end/js/minicart.js')}}"></script>
  <script>
    paypalm.minicartk.render(); //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js

    paypalm.minicartk.cart.on('checkout', function (evt) {
      var items = this.items(),
        len = items.length,
        total = 0,
        i;

      // Count the number of each item in the cart
      for (i = 0; i < len; i++) {
        total += items[i].get('quantity');
      }

      if (total < 3) {
        alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
        evt.preventDefault();
      }
    });
  </script>
  <!-- //cart-js -->

  <!-- password-script -->
  <script>
    window.onload = function () {
      document.getElementById("password1").onchange = validatePassword;
      document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
      var pass2 = document.getElementById("password2").value;
      var pass1 = document.getElementById("password1").value;
      if (pass1 != pass2)
        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
      else
        document.getElementById("password2").setCustomValidity('');
      //empty string means no validation error
    }
  </script>
  <!-- //password-script -->

  <!-- smoothscroll -->
  <script src="{{url('front-end/js/SmoothScroll.min.js')}}"></script>
  <!-- //smoothscroll -->

  <!-- start-smooth-scrolling -->
  <script src="{{url('front-end/js/move-top.js')}}"></script>
  <script src="{{url('front-end/js/easing.js')}}"></script>
  <script>
    jQuery(document).ready(function ($) {
      $(".scroll").click(function (event) {
        event.preventDefault();

        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });
  </script>
  <!-- //end-smooth-scrolling -->

  <!-- smooth-scrolling-of-move-up -->
  <script>
    $(document).ready(function () {
      /*
      var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
      };
      */
      $().UItoTop({
        easingType: 'easeOutQuart'
      });

    });
  </script>
  <!-- //smooth-scrolling-of-move-up -->

  <!-- imagezoom -->
  <script src="{{url('front-end/js/imagezoom.js')}}"></script>
  <!-- //imagezoom -->

  <!-- FlexSlider -->
  <script src="{{url('front-end/js/jquery.flexslider.js')}}"></script>
  <script>
    // Can also be used with $(document).ready()
    $(window).load(function () {
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
      });
    });
  </script>
  <!-- //FlexSlider-->

  <!-- flexisel (for special offers) -->
  <script src="{{url('front-end/js/jquery.flexisel.js')}}"></script>
  <script>
    $(window).load(function () {
      $("#flexiselDemo1").flexisel({
        visibleItems: 3,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
          portrait: {
            changePoint: 480,
            visibleItems: 1
          },
          landscape: {
            changePoint: 640,
            visibleItems: 2
          },
          tablet: {
            changePoint: 768,
            visibleItems: 2
          }
        }
      });

    });
  </script>
  <!-- //flexisel (for special offers) -->

  <!-- for bootstrap working -->
  <script src="{{url('front-end/js/bootstrap.js')}}"></script>
  <!-- //for bootstrap working -->
	<script src="{{url('/js/main.js')}}"></script>
  <!-- //js-files -->
	@if ($errors->has('password') || $errors->has('email'))
		<script type="text/javascript">$("#myModal1").modal();</script>
	@endif
	@if ($errors->has('name') || $errors->has('firstName') || $errors->has('lastName') || $errors->has('email') || $errors->has('password') || $errors->has('password_confirmation'))
		<script type="text/javascript">$("#myModal2").modal();</script>
	@endif
  </body>

  </html>
