@extends('layouts.admin')

@section('content')
  <form  action="/update-order" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="order_id" value="{{$order->id}}">

    <table class="table table-dark">
      <tbody>

        <tr>
          <th scope="row">State </th>
          <td>
            <select class="form-control" name="state">
              <option value="0" @if ( old('state') == 0 || (isset($order) && $order->state == 0) ) selected @endif> Unpackaged </option>
              <option value="1"  @if ( old('state') == 1 || (isset($order) && $order->state == 1) ) selected @endif> Packaged </option>
              <option value="2" @if ( old('state') == 2 || (isset($order) && $order->state == 2) ) selected @endif> Released </option>
            </select>
          </td>
          <td>
            @if ($errors->has('state'))
              <span  role="alert">
                  <strong>{{ $errors->first('state') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Payment status </th>
          <td>
            <select class="form-control" name="status">
              <option value="0" @if ( old('status') == 0 || (isset($order) && $order->payment->status == 0) ) selected @endif> Pending </option>
              <option value="1"  @if ( old('status') == 1 || (isset($order) && $order->payment->status == 1) ) selected @endif> Completed </option>
            </select>
          </td>
          <td>
            @if ($errors->has('status'))
              <span  role="alert">
                  <strong>{{ $errors->first('status') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Payment method </th>
          <td>
            <select class="form-control" name="method">
              <option value="1" @if ( old('method') == 1 || (isset($order) && $order->payment->method == 1) ) selected @endif> Mpesa </option>
              <option value="2"  @if ( old('method') == 2 || (isset($order) && $order->payment->method == 2) ) selected @endif> Cash </option>
            </select>
          </td>
          <td>
            @if ($errors->has('method'))
              <span  role="alert">
                  <strong>{{ $errors->first('method') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Amount Due </th>
          <td>
            <input type="text" name="amountDue" value="@if(old('amountDue')){{old('amountDue')}} @elseif( isset($order)) {{$order->payment->amountDue}} @endif">
          </td>
          <td>
            @if ($errors->has('amountDue'))
              <span  role="alert">
                  <strong>{{ $errors->first('amountDue') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Collection point </th>
          <td>
            <select class="form-control" name="collectAt">
              <option value="0" @if ( old('collectAt') == 1 || (isset($order) && $order->collectAt == 1) ) selected @endif> Supermarket </option>
            </select>
          </td>
          <td>
            @if ($errors->has('collectAt'))
              <span  role="alert">
                  <strong>{{ $errors->first('collectAt') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Collection time </th>
          <td>
            <input type="text" name="collectOn" value="@if(old('collectOn')) {{old('collectOn')}} @elseif( isset($order) ) {{$order->collectOn}} @endif"> ~
            <input type="text" name="collectTime" value="@if(old('collectTime')) {{old('collectTime')}} @elseif( isset($order) ) {{$order->collectTime}} @endif">
          </td>
          <td>
            @if ($errors->has('collectOn'))
              <span  role="alert">
                  <strong>{{ $errors->first('collectOn') }}</strong>
              </span>
            @endif
            @if ($errors->has('collectTime'))
              <span  role="alert">
                  <strong>{{ $errors->first('collectTime') }}</strong>
              </span>
            @endif
         </td>
        </tr>

      </tbody>
    </table>
    <button class="btn btn-success" type="submit" name="submit">Update</button>
    <a class="btn btn-danger" href="/delete-order/{{$order->id}}" name="button">Soft delete</a>
  </form>

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
