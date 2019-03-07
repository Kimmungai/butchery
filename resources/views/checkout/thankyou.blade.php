@extends('layouts.app')

@section('content')

  <h1>Thank you</h1>
  <div class="customer-info">
    <h1>User</h1>
    <p>{{$savedUserData->firstName}}</p>
  </div>

  <div class="order-info">
    <h1>Order</h1>
    <p>{{$savedOrderData->collectOn}}</p>

    <h1>Payment</h1>
    <p>{{$savedOrderData->payment}}</p>

    <h1>Session</h1>
    <p>{{session('savedUserData')}}</p>
    <p>{{session('savedOrderData')}}</p>
 </div>
@endsection
