@extends('layouts.app')

@section('content')
<div class="customer-info">
  <h1>User</h1>
  <p>{{$savedUserData->firstName}}</p>
</div>

<div class="order-info">
  <h1>Order</h1>
  <p>{{$savedOrderData->collectOn}}</p>

  <h1>Payment</h1>
  <p>{{$savedOrderData->payment}}</p>

  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
  <!--<form class="" action="{{url('/mpesa-callback')}}" method="post">
    {{csrf_field()}}
    <input type="text" name="amount" value="45">
    <input type="submit" name="submit" value="Send">
  </form>-->

  @if( $savedOrderData->payment->method == 1 )
    <p>MPESA</p>
    <button type="button" onclick="process_mpesa_payment({{$savedUserData->id}},{{$savedOrderData->id}})">Confirm and pay</button>
  @endif

</div>


@endsection
