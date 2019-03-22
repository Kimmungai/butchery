@extends('layouts.admin')

  @section('content')
  <!--outter-wp-->
    <div class="outter-wp">
        <!--sub-heard-part-->
          <div class="sub-heard-part">
           <ol class="breadcrumb m-b-0">
            <li><a href="{{url('/admin')}}">Home</a></li>
            <li class="active">Orders</li>
          </ol>
           </div>
        <!--//sub-heard-part-->
        <div class="graph-visual tables-main">

            <h3 class="inner-tittle two">Orders </h3>
                <div class="graph">
                <div class="tables">

                  <table class="table table-bordered">
                    <thead>
                      <tr> <th>#</th> <th>State</th> <th>Collect At</th> <th>Collect Time</th>  <th>Action</th></tr>
                    </thead>
                    <tbody>
                      <?php $count=1;?>
                        @foreach($orders as $order)
                        <tr>
                          <th scope="col">{{$count}}</th>
                          <td>{{$order->state}}</td>
                          <td>{{$order->collectAt}}</td>
                          <td>{{$order->collectTime}}</td>
                          <td><a href="{{url('/order/'.$order->id)}}" class="btn btn-outline-dark">open</a></td>
                        </tr>
                        <?php $count++;?>
                        @endforeach

                    </tbody>
                  </table>

                  {{$orders->links()}}

                </div>
            </div>

          </div>
          <!--//graph-visual-->
        </div>
        <!--//outer-wp-->
  @endsection
