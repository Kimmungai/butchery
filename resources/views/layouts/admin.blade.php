<!DOCTYPE HTML>
<html>
<head>
<title>{{ config('app.name', 'Laravel') }} | Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{{url('back-end/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{url('back-end/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
<!--<link href="{{url('back-end/css/font-awesome.css')}}" rel="stylesheet">-->
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="{{url('back-end/css/icon-font.min.css')}}" type='text/css' />
<!-- //lined-icons -->
<script src="{{url('back-end/js/jquery-1.10.2.min.js')}}"></script>
<script src="{{url('back-end/js/amcharts.js')}}"></script>
<script src="{{url('back-end/js/serial.js')}}"></script>
<script src="{{url('back-end/js/light.js')}}"></script>
<script src="{{url('back-end/js/radar.js')}}"></script>
<link href="{{url('back-end/css/barChart.css')}}" rel='stylesheet' type='text/css' />
<link href="{{url('back-end/css/fabochart.css')}}" rel='stylesheet' type='text/css' />
<!--clock init-->
<script src="{{url('back-end/js/css3clock.js')}}"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="{{url('back-end/js/skycons.js')}}"></script>

<script src="{{url('back-end/js/jquery.easydropdown.js')}}"></script>

<!--//skycons-icons-->
</head>
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
						<!--menu-right-->
						<div class="top_menu">
						        <!--<div class="main-search">
											<form>
											   <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
												<input type="submit" value="">
											</form>
									<div class="close"><img src="{{url('back-end/images/cross.png')}}" /></div>
								</div>
									<div class="srch"><button></button></div>-->
									<script type="text/javascript">
										 $('.main-search').hide();
										$('button').click(function (){
											$('.main-search').show();
											$('.main-search text').focus();
										}
										);
										$('.close').click(function(){
											$('.main-search').hide();
										});
									</script>
							<!--/profile_details-->
								<div class="profile_details_left">
									<ul class="nofitications-dropdown">
											<li class="dropdown note dra-down">
													   <div id="dd" class="wrapper-dropdown-3" tabindex="1">

                                      @if( isset($userSupermarkets) )
  																			<span>@if(count($userSupermarkets)) {{substr($userSupermarkets[0]->name,0,8)}} @endif</span>
  																			<ul class="dropdown">

                                            @foreach($userSupermarkets as $supermarket)
                                              <li onclick="open_url('{{url('set-supermarket')}}/{{$supermarket->id}}')"><a href="#" class="english">{{substr($supermarket->name,0,8)}}</a></li>
                                            @endforeach


  																			</ul>
                                      @endif
																		</div>
																		<script type="text/javascript">

																	function DropDown(el) {
																		this.dd = el;
																		this.placeholder = this.dd.children('span');
																		this.opts = this.dd.find('ul.dropdown > li');
																		this.val = '';
																		this.index = -1;
																		this.initEvents();
																	}
																	DropDown.prototype = {
																		initEvents : function() {
																			var obj = this;

																			obj.dd.on('click', function(event){
																				$(this).toggleClass('active');
																				return false;
																			});

																			obj.opts.on('click',function(){
																				var opt = $(this);
																				obj.val = opt.text();
																				obj.index = opt.index();
																				obj.placeholder.text(obj.val);
																			});
																		},
																		getValue : function() {
																			return this.val;
																		},
																		getIndex : function() {
																			return this.index;
																		}
																	}

																	$(function() {

																		var dd = new DropDown( $('#dd') );

																		$(document).click(function() {
																			// all dropdowns
																			$('.wrapper-dropdown-3').removeClass('active');
																		});

																	});

																</script>
										    </li>
									       <!--<li class="dropdown note">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i> <span class="badge">3</span></a>


													<ul class="dropdown-menu two first">
														<li>
															<div class="notification_header">
																<h3>You have 3 new messages  </h3>
															</div>
														</li>
														<li><a href="#">
														   <div class="user_img"><img src="images/1.jpg" alt=""></div>
														   <div class="notification_desc">
															<p>Lorem ipsum dolor sit amet</p>
															<p><span>1 hour ago</span></p>
															</div>
														   <div class="clearfix"></div>
														 </a></li>
														 <li class="odd"><a href="#">
															<div class="user_img"><img src="images/in.jpg" alt=""></div>
														   <div class="notification_desc">
															<p>Lorem ipsum dolor sit amet </p>
															<p><span>1 hour ago</span></p>
															</div>
														  <div class="clearfix"></div>
														 </a></li>
														<li><a href="#">
														   <div class="user_img"><img src="images/in1.jpg" alt=""></div>
														   <div class="notification_desc">
															<p>Lorem ipsum dolor sit amet </p>
															<p><span>1 hour ago</span></p>
															</div>
														   <div class="clearfix"></div>
														</a></li>
														<li>
															<div class="notification_bottom">
																<a href="#">See all messages</a>
															</div>
														</li>
													</ul>
										</li>-->

							<!--<li class="dropdown note">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i> <span class="badge">5</span></a>

									<ul class="dropdown-menu two">
										<li>
											<div class="notification_header">
												<h3>You have 5 new notification</h3>
											</div>
										</li>
										<li><a href="#">
											<div class="user_img"><img src="images/in.jpg" alt=""></div>
										   <div class="notification_desc">
											<p>Lorem ipsum dolor sit amet</p>
											<p><span>1 hour ago</span></p>
											</div>
										  <div class="clearfix"></div>
										 </a></li>
										 <li class="odd"><a href="#">
											<div class="user_img"><img src="images/in5.jpg" alt=""></div>
										   <div class="notification_desc">
											<p>Lorem ipsum dolor sit amet </p>
											<p><span>1 hour ago</span></p>
											</div>
										   <div class="clearfix"></div>
										 </a></li>
										 <li><a href="#">
											<div class="user_img"><img src="images/in8.jpg" alt=""></div>
										   <div class="notification_desc">
											<p>Lorem ipsum dolor sit amet </p>
											<p><span>1 hour ago</span></p>
											</div>
										   <div class="clearfix"></div>
										 </a></li>
										 <li>
											<div class="notification_bottom">
												<a href="#">See all notification</a>
											</div>
										</li>
									</ul>
							</li>-->
						<li class="dropdown note">
								<a href="#" class="dropdown-toggle"  aria-expanded="false" data-toggle="modal" data-target="#myModal" style="color:#fff;">Formula <i class="fa fa-cogs"></i> <!--<span class="badge blue1">9</span>--></a>
										<!--<ul class="dropdown-menu two">
										<li>
											<div class="notification_header">
												<h3>You have 9 pending task</h3>
											</div>
										</li>
										<li><a href="#">
												<div class="task-info">
												<span class="task-desc">Database update</span><span class="percentage">40%</span>
												<div class="clearfix"></div>
											   </div>
												<div class="progress progress-striped active">
												 <div class="bar yellow" style="width:40%;"></div>
											</div>
										</a></li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
											   <div class="clearfix"></div>
											</div>

											<div class="progress progress-striped active">
												 <div class="bar green" style="width:90%;"></div>
											</div>
										</a></li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
												<div class="clearfix"></div>
											</div>
										   <div class="progress progress-striped active">
												 <div class="bar red" style="width: 33%;"></div>
											</div>
										</a></li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
											   <div class="clearfix"></div>
											</div>
											<div class="progress progress-striped active">
												 <div class="bar  blue" style="width: 80%;"></div>
											</div>
										</a></li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all pending task</a>
											</div>
										</li>
									</ul>-->
							</li>
							<div class="clearfix"></div>
								</ul>
							</div>
							<div class="clearfix"></div>
							<!--//profile_details-->
						</div>
						<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
					<!-- //header-ends -->
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
          @if ( count($errors) )
              <div class="alert alert-danger" role="alert">
                  Please correct all highlighted errors in the form first
              </div>
          @endif

          <!-- start Formula Modal -->
          <form  action="{{url('/daily-formula')}}" method="post">
            @csrf
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Todays Formula</h4>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Chicken (1)</th>
                          <th>Weight (kg)</th>
                          <th>Parts (produces)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td><img src="{{url('front-end/images/banner2.jpg')}}" alt="" height="100" width="100"> </td>
                          <td>
                            <select class="form-control1" name="weight1">
                              <option value="1">0kg ~ 0.8kg</option>
                              <option value="2">0.9kg ~ 2.1kg</option>
                              <option value="3">over 2.1kg</option>
                            </select>
                          </td>
                          <td>
                            breast <input class="form-control1" type="number" name="breast1" value="0">
                            wings <input class="form-control1" type="number" name="wings1" value="0">
                            legs <input class="form-control1" type="number" name="legs1" value="0">
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td><img src="{{url('front-end/images/banner2.jpg')}}" alt="" height="100" width="100"> </td>
                          <td>
                            <select class="form-control1" name="weight2">
                              <option value="1">0kg ~ 0.8kg</option>
                              <option value="2" selected>0.9kg ~ 2.1kg</option>
                              <option value="3">over 2.1kg</option>
                            </select>
                          </td>
                          <td>
                            breast <input class="form-control1" type="number" name="breast2" value="1">
                            wings <input class="form-control1" type="number" name="wings2" value="1">
                            legs <input class="form-control1" type="number" name="legs2" value="1">
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td><img src="{{url('front-end/images/banner2.jpg')}}" alt="" height="100" width="100"> </td>
                          <td>
                            <select class="form-control1" name="weight3">
                              <option value="1">0kg ~ 0.8kg</option>
                              <option value="2">0.9kg ~ 2.1kg</option>
                              <option value="3" selected>over 2.1kg</option>
                            </select>
                          </td>
                          <td>
                            breast <input class="form-control1" type="number" name="breast3" value="1">
                            wings <input class="form-control1" type="number" name="wings3" value="1">
                            legs <input class="form-control1" type="number" name="legs3" value="1">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <!-- End Formula Modal -->

          @yield('content')

          <!--footer section start-->
           <footer>
              <p>&copy {{date('Y')}} {{ config('app.name', 'Laravel') }} . All Rights Reserved </p>
           </footer>
         <!--footer section end-->
       </div>
     </div>
<!--//content-inner-->
<!--/sidebar-menu-->
<div class="sidebar-menu">
 <header class="logo">
 <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="{{url('/admin')}}"> <span id="logo"> <h1>{{ config('app.name', 'Laravel') }}</h1></span>
 <!--<img id="logo" src="" alt="Logo"/>-->
 </a>
</header>
<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
<!--/down-->
     <div class="down">
           <a href="{{url('/admin')}}"><img src="{{Auth::user()->avatar}}" height="70" width="70" alt="{{Auth::user()->lastName}}"></a>
           <a href="{{url('/admin')}}"><span class=" name-caret">{{Auth::user()->firstName}} {{Auth::user()->lastName}}</span></a>
          <p>{{Auth::user()->admin->designation}} in {{ config('app.name', 'Laravel') }}</p>
         <ul>
         <li><a class="tooltips" href="{{url('/admin-profile')}}"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
           <li><a class="tooltips" href="{{url('update-admin-profile')}}"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
           <li>
             <a class="tooltips" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span>Log out</span><i class="lnr lnr-power-switch"></i></a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
           </li>
           </ul>
         </div>
        <!--//down-->
                  <div class="menu">
         <ul id="menu" >
           <li><a href="/admin"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
           <li><a href="/products"><i class="fas fa-warehouse"></i> <span>Items</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub" >
              <li id="menu-academico-avaliacoes" ><a href="{{url('/register-product')}}"> New</a></li>
            </ul>
           </li>
           <li><a href="/departments"><i class="fas fa-building"></i> <span>Departments</span> <span class="fa fa-angle-right" style="float: right"></span></a>
             <ul id="menu-academico-sub" >
            <li id="menu-academico-avaliacoes" ><a href="{{url('/register-department')}}"> New</a></li>
            </ul>
           </li>
           <li><a href="/categories"><i class="fas fa-tags"></i> <span>Categories</span> <span class="fa fa-angle-right" style="float: right"></span></a>
             <ul id="menu-academico-sub" >
            <li id="menu-academico-avaliacoes" ><a href="{{url('/register-category')}}"> New</a></li>
            </ul>
           </li>
           <li><a href="/orders"><i class="fas fa-wallet"></i> <span>Orders</span></a></li>

            <li id="menu-academico" ><a href="#"><i class="fa fa-users"></i> <span> Users <span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-academico-sub" >
             <li id="menu-academico-avaliacoes" ><a href="{{url('/customers')}}"> Customers</a></li>
             <li id="menu-academico-boletim" ><a href="{{url('/staff')}}">Staff</a></li>
             <li id="menu-academico-avaliacoes" ><a href="{{url('/admins')}}">Administrators</a></li>

             </ul>
           </li>
           <li id="menu-academico" ><a href="#"><i class="fas fa-trash-alt"></i> <span> Trash</span> <span class="fa fa-angle-right" style="float: right"></span></a>
             <ul id="menu-academico-sub" >
            <li id="menu-academico-avaliacoes" ><a href="/trashed-users"> Users</a></li>
            <li id="menu-academico-boletim" ><a href="/trashed-products">Products</a></li>
            <li id="menu-academico-avaliacoes" ><a href="/trashed-departments">Departments</a></li>
            <li id="menu-academico-avaliacoes" ><a href="/trashed-categories">Categories</a></li>
            <li id="menu-academico-avaliacoes" ><a href="{{url('/trashed-orders')}}">Orders</a></li>
            </ul>
          </li>
            <!--<li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Ui Elements</span> <span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-academico-sub" >
               <li id="menu-academico-avaliacoes" ><a href="forms.html">Forms</a></li>
               <li id="menu-academico-boletim" ><a href="validation.html">Validation Forms</a></li>
               <li id="menu-academico-boletim" ><a href="table.html">Tables</a></li>
               <li id="menu-academico-boletim" ><a href="buttons.html">Buttons</a></li>
               </ul>
            </li>
         <li><a href="typography.html"><i class="lnr lnr-pencil"></i> <span>Typography</span></a></li>
         <li id="menu-academico" ><a href="#"><i class="lnr lnr-book"></i> <span>Pages</span> <span class="fa fa-angle-right" style="float: right"></span></a>
             <ul id="menu-academico-sub" >
               <li id="menu-academico-avaliacoes" ><a href="login.html">Login</a></li>
               <li id="menu-academico-boletim" ><a href="register.html">Register</a></li>
             <li id="menu-academico-boletim" ><a href="404.html">404</a></li>
             <li id="menu-academico-boletim" ><a href="sign.html">Sign up</a></li>
             <li id="menu-academico-boletim" ><a href="profile.html">Profile</a></li>
             </ul>
          </li>
          <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Mail Box</span><span class="fa fa-angle-right" style="float: right"></span></a>
            <ul>
           <li><a href="inbox.html"><i class="fa fa-inbox"></i> Inbox</a></li>
           <li><a href="compose.html"><i class="fa fa-pencil-square-o"></i> Compose Mail</a></li>
           <li><a href="editor.html"><span class="lnr lnr-highlight"></span> Editors Page</a></li>

           </ul>
         </li>
             <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Components</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub" >
             <li id="menu-academico-avaliacoes" ><a href="grids.html">Grids</a></li>
             <li id="menu-academico-boletim" ><a href="media.html">Media Objects</a></li>

             </ul>
          </li>
         <li><a href="chart.html"><i class="lnr lnr-chart-bars"></i> <span>Charts</span> <span class="fa fa-angle-right" style="float: right"></span></a>
           <ul>
           <li><a href="map.html"><i class="lnr lnr-map"></i> Maps</a></li>
           <li><a href="graph.html"><i class="lnr lnr-apartment"></i> Graph Visualization</a></li>
         </ul>
         </li>
         <li id="menu-comunicacao" ><a href="#"><i class="fa fa-smile-o"></i> <span>More</span><span class="fa fa-angle-double-right" style="float: right"></span></a>
           <ul id="menu-comunicacao-sub" >
           <li id="menu-mensagens" style="width:120px" ><a href="project.html">Projects <i class="fa fa-angle-right" style="float: right; margin-right: -8px; margin-top: 2px;"></i></a>
             <ul id="menu-mensagens-sub" >
             <li id="menu-mensagens-enviadas" style="width:130px" ><a href="ribbon.html">Ribbons</a></li>
             <li id="menu-mensagens-recebidas"  style="width:130px"><a href="blank.html">Blank</a></li>
             </ul>
           </li>
           <li id="menu-arquivos" ><a href="500.html">500</a></li>
           </ul>
         </li>-->
         </ul>
       </div>
       </div>
       <div class="clearfix"></div>
     </div>
     <script>
     var toggle = true;

     $(".sidebar-icon").click(function() {
       if (toggle)
       {
       $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
       $("#menu span").css({"position":"absolute"});
       }
       else
       {
       $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
       setTimeout(function() {
         $("#menu span").css({"position":"relative"});
       }, 400);
       }

             toggle = !toggle;
           });
     </script>
<!--js -->
<link rel="stylesheet" href="{{url('back-end/css/vroom.css')}}">
<script type="text/javascript" src="{{url('back-end/js/vroom.js')}}"></script>
<script type="text/javascript" src="{{url('back-end/js/TweenLite.min.js')}}"></script>
<script type="text/javascript" src="{{url('back-end/js/CSSPlugin.min.js')}}"></script>
<script src="{{url('back-end/js/jquery.nicescroll.js')}}"></script>
<script src="{{url('back-end/js/scripts.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{url('back-end/js/bootstrap.min.js')}}"></script>
<script src="{{url('/js/admin.js')}}"></script>

</body>
</html>
