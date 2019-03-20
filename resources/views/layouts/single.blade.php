<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<p>Grocery Offer Zone Top Deals & Discounts</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="/home">
						<span>{{ config('app.name', 'Laravel') }}</span> supermarket
						<img src="images/logo2.png" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li>
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
							<span class="fa fa-map-marker" aria-hidden="true"></span> Shop Locator</a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-truck" aria-hidden="true"></span>Track Order</a>
					</li>
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal2">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
					</li>
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
					<form action="#" method="post">
						<input name="Search" type="search" placeholder="How can we help you today?" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="w3view-cart" type="submit" name="submit" value="">
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- Button trigger modal(shop-locator) -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="select-city">
			<h3>Please Select Your Location</h3>
			<select class="list_of_cities">
				<optgroup label="Utawala">
					<option selected style="display:none;color:#eee;">Select City</option>
					<option>AP</option>
				</optgroup>

			</select>
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
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="User Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" required="">
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
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="Email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password1" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirm Password" name="Confirm Password" id="password2" required="">
							</div>
							<input type="submit" value="Sign Up">
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
								<li class="">
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
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
  @yield('content')
  <!-- newsletter -->
  <div class="footer-top">
    <div class="container-fluid">
      <div class="col-xs-8 agile-leftmk">
        <h2>Get your Groceries delivered from local stores</h2>
        <p>Free Delivery on your first order!</p>
        <form action="#" method="post">
          <input type="email" placeholder="E-mail" name="email" required="">
          <input type="submit" value="Subscribe">
        </form>
        <div class="newsform-w3l">
          <span class="fa fa-envelope-o" aria-hidden="true"></span>
        </div>
      </div>
      <div class="col-xs-4 w3l-rightmk">
        <img src="images/tab3.png" alt=" ">
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
                <a href="about.html">About Us</a>
              </li>
              <li>
                <a href="contact.html">Contact Us</a>
              </li>
              <li>
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
              </li>
            </ul>
          </div>
          <div class="col-xs-6 footer-grids">
            <h3>Get in Touch</h3>
            <ul>
              <li>
                <i class="fa fa-map-marker"></i> 123 Sebastian, USA.</li>
              <li>
                <i class="fa fa-mobile"></i> 333 222 3333 </li>
              <li>
                <i class="fa fa-phone"></i> +222 11 4444 </li>
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
        © 2017 Grocery Shoppy. All rights reserved | Design by
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
  <!-- //js-files -->

  </body>

  </html>
