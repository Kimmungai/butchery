@extends('layouts.admin')

  @section('content')
  <!--outter-wp-->
    <div class="outter-wp">
        <!--sub-heard-part-->
          <div class="sub-heard-part">
           <ol class="breadcrumb m-b-0">
            <li><a href="{{url('/admin')}}">Home</a></li>
            <li class="active">Tables</li>
          </ol>
           </div>
        <!--//sub-heard-part-->
        <div class="graph-visual tables-main">

            <h3 class="inner-tittle two">Administrators </h3>
                <div class="graph">
                <div class="tables">

                  <table class="table table-bordered">
                    <thead>
                      <tr> <th>#</th> <th>Image</th> <th>Name</th> <th>Designation</th> <th>Phone</th> <th>Action</th></tr>
                    </thead>
                    <tbody>
                      <?php $count=1;?>
                        @foreach ($admins as $admin)
                          <tr>
                            <th scope="row">{{$count}}</th>
                            <td><img src="{{$admin->user->avatar}}" alt="{{$admin->user->firstName}}" height="50" width="50"></td>
                            <td>{{$admin->user->firstName}} {{$admin->user->lastName}}</td>
                            <td>{{$admin->designation}}</td>
                            <td>{{$admin->user->phoneNumberl}}</td>
                            <td><a href="{{url('/admin/'.$admin->user->id)}}" class="btn blue one">open</a></td>
                          </tr>
                          <?php $count++;?>
                         @endforeach
                    </tbody>
                  </table>

                  {{$admins->links()}}

                </div>
            </div>

          </div>
          <!--//graph-visual-->
        </div>
        <!--//outer-wp-->
  @endsection
