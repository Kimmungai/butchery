@extends('layouts.admin')

  @section('content')
  <!--outter-wp-->
    <div class="outter-wp">
        <!--sub-heard-part-->
          <div class="sub-heard-part">
           <ol class="breadcrumb m-b-0">
            <li><a href="{{url('/admin')}}">Home</a></li>
            <li class="active">All Customers</li>
          </ol>
           </div>
        <!--//sub-heard-part-->
        <div class="graph-visual tables-main">

            <h3 class="inner-tittle two">Customers </h3>
                <div class="graph">
                <div class="tables">

                  <table class="table table-bordered">
                    <thead>
                      <tr> <th>#</th> <th>Image</th> <th>Name</th> <th>Stock</th> <th>Email</th> <th>Action</th></tr>
                    </thead>
                    <tbody>
                      <?php $count=1;?>
                        @foreach ($customers as $customer)
                          <tr>
                            <th scope="row">{{$count}}</th>
                            <td><img src="{{$customer->user->avatar}}" alt="{{$customer->user->firstName}}" height="50" width="50"></td>
                            <td>{{$customer->user->firstName}} {{$customer->user->lastName}}</td>
                            <td>{{count($customer->order)}} times</td>
                            <td>{{$customer->user->email}}</td>
                            <td><a href="{{url('/customer/'.$customer->user->id)}}" class="btn blue one">open</a></td>
                          </tr>
                          <?php $count++;?>
                         @endforeach
                    </tbody>
                  </table>

                  {{$customers->links()}}

                </div>
            </div>

          </div>
          <!--//graph-visual-->
        </div>
        <!--//outer-wp-->
  @endsection
