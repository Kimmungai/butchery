@extends('layouts.admin')
  @section('content')

						<div class="outter-wp">
								<!--custom-widgets-->
												<div class="custom-widgets">
												   <div class="row-one">

														<a href="/customers"><div class="col-md-3 widget">
															<div class="stats-left ">
																<h5>Today</h5>
																<h4> Customers</h4>
															</div>
															<div class="stats-right">
																<label>{{$statistics['todayCustomers']}}</label>
															</div>
															<div class="clearfix"> </div>
														</div></a>

														<a href="/orders"><div class="col-md-3 widget states-mdl">
															<div class="stats-left">
																<h5>Today</h5>
																<h4>Orders</h4>
															</div>
															<div class="stats-right">
																<label> {{$statistics['todayOrders']}}</label>
															</div>
															<div class="clearfix"> </div>
														</div></a>

														<a href="/products"><div class="col-md-3 widget states-thrd">
															<div class="stats-left">
																<h5>All</h5>
																<h4>Items</h4>
															</div>
															<div class="stats-right">
																<label>{{$statistics['allProducts']}}</label>
															</div>
															<div class="clearfix"> </div>
														</div></a>


														<a href="/staff"><div class="col-md-3 widget states-last">
															<div class="stats-left">
																<h5>All</h5>
																<h4>Staff</h4>
															</div>
															<div class="stats-right">
																<label>{{$statistics['allStaff']}}</label>
															</div>
															<div class="clearfix"> </div>
														</div>  </a>

														<div class="clearfix"> </div>
													</div>
												</div>


												<!--/charts-->
												<div class="charts">
												  <div class="chrt-inner">
												    <div class="chrt-bars">

                                <div class="stats-grid">
                                <div class="stats-head">
                                    <h4 class="title3">General statistics</h4>
                                  </div>
                                <div class="stats-info graph">
                                  <div class="stats">
                                    <ul class="list-unstyled">
                                      <li>Monthly new customers<div class="text-success pull-right">{{$statistics['monthCustomers']}}<!--<i class="fas fa-level-up-alt text-success"></i>--></div></li>
                                      <li>Monthly new orders<div class="text-success pull-right">{{$statistics['monthOrders']}}<!--<i class="fas fa-level-down-alt text-danger"></i>--></div></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
																<div class="clearfix"> </div>
															</div>

												<!--//charts-->
                        <div class="col-md-6 panel-chrt">
                           <div class="profile-nav alt">
                            <section class="panel">
                              <div class="user-heading alt clock-row terques-bg">
                                <h3 class="sub-tittle clock">  </h3>
                              </div>
                                <ul id="clock">
                                  <li id="sec"></li>
                                  <li id="hour"></li>
                                  <li id="min"></li>
                                </ul>

                              <ul class="clock-category">
                                <li>
                                  <a  class="active">
                                    <img src="{{url('back-end/images/time.png')}}" alt="">
                                    <span>Clock</span>
                                  </a>
                                </li>

                              </ul>

                            </section>

                          </div>
                        </div>

                            @if( count($statistics['pendingOrders']) )
  														<div class="col-md-6 tini-time-line">
  														 <h3 class="sub-tittle">Pending (Booking Confirmation)</h3>
  															<ul class="timeline">
                                  <?php $count = 1; ?>
                                  @foreach( $statistics['pendingOrders'] as $pendingOrder )
                                    <li>
    																  <div class="timeline-badge danger"><i class="fa fa-smile-o"></i></div>
    																  <div class="timeline-panel">
    																	<div class="timeline-heading">
    																	  <h4 class="timeline-title">Confirm</h4>
    																	</div>
    																	<div class="timeline-body">
    																	  <p>Booking {{$pendingOrder->id}} has not yet been approved. <a href="/order/{{$pendingOrder->id}}">click here</a> to approve.</p>
    																	</div>
    																  </div>
    																</li>
                                    <?php if( $count > 10) {break;}?>
                                  @endforeach
  															</ul>
  														</div>
                            @else
                            <div class="col-md-6 tini-time-line">
                             <h3 class="sub-tittle">No pending tasks</h3>

                            </div>
                            @endif

															<div class="clearfix"></div>
													</div>
										<!--/bottom-grids-->
									<div class="bottom-grids">
										<div class="dev-table">
											<div class="col-md-4 dev-col">

                                          @if( $statistics['todayStaffUsage'] )
                                            <div class="dev-widget dev-widget-transparent">
                                                <h2 class="inner one">Staff Usage</h2>
                                                <p>Today {{number_format(($statistics['todayStaffUsage']/$statistics['allStaff'])*100)}}% of staff was engaged</p>
                                                <div class="dev-stat"><span class="counter">{{number_format(($statistics['todayStaffUsage']/$statistics['allStaff'])*100)}}</span>%</div>
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{number_format(($statistics['todayStaffUsage']/$statistics['allStaff'])*100)}}%;"></div>
                                                </div>
                                                <p></p>

                                                <!--<a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>-->
                                            </div>
                                            @else
                                            <div class="dev-widget dev-widget-transparent">
                                                <h2 class="inner one">Staff Usage</h2>
                                                <p>No member of staff was engaged today</p>
                                                <div class="dev-stat"><span class="counter">0</span>%</div>
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                </div>
                                                <p></p>

                                                <!--<a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>-->
                                            </div>
                                            @endif

                                        </div>
                                        <div class="col-md-4 dev-col mid">

                                            <div class="dev-widget dev-widget-transparent dev-widget-success">
                                                 <h3 class="inner">Today Earnings</h3>
                                                <p>This is Today's earnings </p>
                                                <div class="dev-stat">Ksh. <span class="counter">{{$statistics['todayEarnings']}}</span></div>
                                                <div class="progress progress-bar-xs">
                                                  <!--  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 79%;"></div>-->
                                                </div>
                                                <!--<p>We happy to notice you that you become an Elite customer, and you can get some custom sugar.</p>

                                                <a href="#" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>-->
                                            </div>

                                        </div>
                                        <div class="col-md-4 dev-col">
                                          @if( count($statistics['lowStock']) )
                                            <div class="dev-widget dev-widget-transparent dev-widget-danger">
                                                 <h3 class="inner">Low Stock</h3>
                                                 <img class="img-circle" src="{{Auth::user()->avatar}}" alt="" height="70" width="70">
                                                <p>{{count($statistics['lowStock'])}} item(s) are low on stock</p>
                                                <div class="dev-stat"><span class="counter">{{count($statistics['lowStock'])}}</span></div>
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width:{{(count($statistics['lowStock']) / $statistics['allProducts'] )*100}}%;"></div>
                                                </div>
                                                <!--<p>The item is fast moving</p>-->

                                                <a href="/products" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                            </div>
                                            @elseif( count($statistics['allProducts']) == 0 || count($statistics['lowStock']) == 0)
                                            <div class="dev-widget dev-widget-transparent dev-widget-danger">
                                                 <h3 class="inner">No items in stock</h3>
                                                <p>Currently no items have been added to the system. <a href="/register-product">click here</a> to add an item</p>
                                                <div class="dev-stat"><span class="counter">{{$statistics['allProducts']}}</span></div>
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                </div>
                                                <!--<p>The item is fast moving</p>-->

                                                <a href="/products" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                            </div>
                                          @else
                                          <div class="dev-widget dev-widget-transparent dev-widget-danger">
                                               <h3 class="inner">All items are well stocked</h3>
                                              <p>All {{$statistics['allProducts']}} item(s) are above the minimum stock levels</p>
                                              <div class="dev-stat"><span class="counter">{{$statistics['allProducts']}}</span></div>
                                              <div class="progress progress-bar-xs">
                                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                              </div>
                                              <!--<p>The item is fast moving</p>-->

                                              <a href="/products" class="dev-drop">Take a closer look <span class="fa fa-angle-right pull-right"></span></a>
                                          </div>
                                        @endif
                                        </div>
										<div class="clearfix"></div>

										</div>
										</div>
									<!--//bottom-grids-->

									</div>
									<!--/charts-inner-->
									</div>
										<!--//outer-wp-->
									</div>

@endsection
