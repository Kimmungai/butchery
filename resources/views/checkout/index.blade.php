@extends('layouts.front-end')

@section('content')
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
                      @foreach ($allSupermarkets as $supermarket)
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
