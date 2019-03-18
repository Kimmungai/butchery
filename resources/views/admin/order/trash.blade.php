@extends('layouts.admin')

@section('content')

<table class="table table-dark">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">State</th>
    <th scope="col">Collect At</th>
    <th scope="col">Collect Time</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
    @if(isset( $orders ))
    <?php $count=1;?>
      @foreach($orders as $order)
      <tr>
        <th scope="col">{{$count}}</th>
        <td>{{$order->state}}</td>
        <td>{{$order->collectAt}}</td>
        <td>{{$order->collectTime}}</td>
        <td><a href="{{url('trashed-order/'.$order->id)}}" class="btn btn-outline-dark">open</a></td>
      </tr>
      <?php $count++;?>
      @endforeach
    @endif
</tbody>
</table>

@endsection
