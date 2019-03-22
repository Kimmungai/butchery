@extends('layouts.app')

@section('content')


<form id="new-order-form" class="" action="{{url('/new-order')}}" method="post" onsubmit="prevent_multiple_submit(this.id)">
  {{csrf_field()}}
  <div class="customer-data">
    <h1>customer data</h1>
    <input type="text" name="firstName" value="@if (old('firstName')) {{old('firstName')}} @elseif (Auth::user() && Auth::user()->firstName != '' ) {{Auth::user()->firstName }}  @endif" placeholder="firstName" required>
    @if ($errors->has('firstName'))
        <span  role="alert">
            <strong>{{ $errors->first('firstName') }}</strong>
        </span>
    @endif
    <input type="text" name="lastName" value="@if (old('lastName')) {{old('lastName')}} @elseif (Auth::user() && Auth::user()->lastName != '') {{Auth::user()->lastName}}  @endif" placeholder="lastName" required>
    @if ($errors->has('lastName'))
        <span  role="alert">
            <strong>{{ $errors->first('lastName') }}</strong>
        </span>
    @endif
    <input type="email" name="email" value="@if (old('email')) {{old('email')}} @elseif (Auth::user() && Auth::user()->email != '') {{Auth::user()->email}}  @endif" placeholder="email" required>
    @if ($errors->has('email'))
        <span  role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    <input type="text" name="phoneNumber" value="@if (old('phoneNumber')) {{old('phoneNumber')}} @elseif (Auth::user() && Auth::user()->phoneNumber != '') {{Auth::user()->phoneNumber}}  @endif" placeholder="phoneNumber" required>
    @if ($errors->has('phoneNumber'))
        <span  role="alert">
            <strong>{{ $errors->first('phoneNumber') }}</strong>
        </span>
    @endif
    <input type="text" name="address" value="@if (old('address')) {{old('address')}} @elseif (Auth::user() && Auth::user()->address != '') {{Auth::user()->address}}  @endif" placeholder="address" required>
    @if ($errors->has('address'))
        <span  role="alert">
            <strong>{{ $errors->first('address') }}</strong>
        </span>
    @endif
    @if (!Auth::user())
      <input type="password" name="password" value="" placeholder="Your password" required>
      @if ($errors->has('password'))
          <span  role="alert">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
      <input type="password" name="password_confirm" value="" placeholder="Retype password" required>
      @if ($errors->has('password_confirm'))
          <span  role="alert">
              <strong>{{ $errors->first('password_confirm') }}</strong>
          </span>
      @endif
    @endif
  </div>
  <div class="order-data">
    <h1>Order data</h1>
    <input type="date" name="collectOn" value="{{old('collectOn')}}" placeholder="Collect on" required>
    @if ($errors->has('collectOn'))
        <span  role="alert">
            <strong>{{ $errors->first('collectOn') }}</strong>
        </span>
    @endif
    12:00~1:00<input type="radio" name="collectTime" value="0" @if(old('collectTime')==0) checked @endif required>
    13:00~2:00<input type="radio" name="collectTime" value="1" @if(old('collectTime')==1) checked @endif required>
    @if ($errors->has('collectTime'))
        <span  role="alert">
            <strong>{{ $errors->first('collectTime') }}</strong>
        </span>
    @endif
    <select  name="collectAt">
      @foreach ($supermarkets as $supermarket)
        @if ($supermarket->id == session('selectedSupermarket'))
          <option>{{$supermarket->name}}</option>
          <?php break;?>
        @endif
      @endforeach

    </select>

    <textarea name="description" rows="8" cols="80" placeholder="Special instructions...">{{old('collectAt')}}</textarea>
    @if ($errors->has('description'))
        <span  role="alert">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
  </div>
  <div class="payment-method">
    <h1>payment method</h1>
    mpesa: <input type="radio" name="method" value="1" @if(old('method')==1) checked @endif required>
    @if ($errors->has('method'))
        <span  role="alert">
            <strong>{{ $errors->first('method') }}</strong>
        </span>
    @endif
  </div>
  <button id="new-order-form-btn" type="submit" name="button" class="btn btn-primary btn-lg">Confirm Order</button>
</form>

@endsection
