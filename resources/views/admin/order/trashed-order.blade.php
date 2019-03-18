@extends('layouts.admin')

@section('content')

  <table class="table table-dark">
    <tbody>

      <tr>
        <th scope="row">State </th>
        <td>
            @if (  (isset($order) && $order->state == 0) ) Unpackaged @endif
            @if (  (isset($order) && $order->state == 1) ) Packaged @endif
            @if (  (isset($order) && $order->state == 2) ) Released @endif
        </td>

      </tr>


      <tr>
        <th scope="row">Collection point </th>
        <td>
          @if (isset($order) && $order->collectAt == 1)  Supermarket @endif
        </td>

      </tr>

      <tr>
        <th scope="row">Collection time </th>
        <td>
          @if( isset($order) ) {{$order->collectOn}} @endif ~
          @if( isset($order) ) {{$order->collectTime}} @endif
        </td>

      </tr>

    </tbody>
  </table>
  <a class="btn btn-success" href="/restore-order/{{$order->id}}" name="button">Restore order</a>
  <a class="btn btn-danger" href="/remove-order/{{$order->id}}" name="button">Delete permanently</a>

<h1>Customer Details</h1>
<table class="table table-dark">
<thead>
  <tr>
    <th scope="col">First</th>
    <th scope="col">Last</th>
    <th scope="col">Shopped</th>
    <th scope="col">email</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
  @if( isset($user) && $user->customer )
  <tr>
    <td>{{$user->firstName}}</td>
    <td>{{$user->lastName}}</td>
    <td>{{count($user->customer->order)}} times</td>
    <td>{{$user->email}}</td>
    <td><a href="{{url('/customer/'.$user->id)}}" class="btn btn-outline-dark">open</a></td>
  </tr>
  @endif
</tbody>
</table>

<h1>Packaged by </h1>
<table class="table table-dark">
<thead>
<tr>
  <th scope="col">First</th>
  <th scope="col">Last</th>
  <th scope="col">Phone</th>
  <th scope="col">email</th>
  <th scope="col">Action</th>
</tr>
</thead>
<tbody>
@if( isset( $packagedBy ) && $packagedBy->staff )
<tr>
  <td>{{$packagedBy->firstName}}</td>
  <td>{{$packagedBy->lastName}}</td>
  <td>{{$packagedBy->phoneNumber}} </td>
  <td>{{$packagedBy->email}}</td>
  <td><a href="{{url('/staff/'.$packagedBy->id)}}" class="btn btn-outline-dark">open</a></td>
</tr>
@endif

</tbody>
</table>

<h1>Released by </h1>
<table class="table table-dark">
<thead>
<tr>
  <th scope="col">First</th>
  <th scope="col">Last</th>
  <th scope="col">Phone</th>
  <th scope="col">email</th>
  <th scope="col">Action</th>
</tr>
</thead>
<tbody>
@if( isset( $releasedBy ) && $releasedBy->staff )
<tr>
  <td>{{$releasedBy->firstName}}</td>
  <td>{{$releasedBy->lastName}}</td>
  <td>{{$releasedBy->phoneNumber}} </td>
  <td>{{$releasedBy->email}}</td>
  <td><a href="{{url('/staff/'.$releasedBy->id)}}" class="btn btn-outline-dark">open</a></td>
</tr>
@endif

</tbody>
</table>
@endsection
