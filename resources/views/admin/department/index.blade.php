@extends('layouts.admin')

  @section('content')
  <!--outter-wp-->
    <div class="outter-wp">
        <!--sub-heard-part-->
          <div class="sub-heard-part">
           <ol class="breadcrumb m-b-0">
            <li><a href="{{url('/admin')}}">Home</a></li>
            <li class="active">All Department</li>
          </ol>
           </div>
        <!--//sub-heard-part-->
        <div class="graph-visual tables-main">

            <h3 class="inner-tittle two">Departments </h3>
                <div class="graph">
                <div class="tables">

                  <table class="table table-bordered">
                    <thead>
                      <tr> <th>#</th> <th>Name</th> <th>Type</th> <th>Action</th> </tr>
                    </thead>
                    <tbody>
                      <?php $count=1;?>
                        @foreach ($departments as $department)
                          <tr>
                            <th scope="row">{{$count}}</th>
                            <td>{{$department->name}}</td>
                            <td>Type {{$department->type}}</td>
                            <td><a href="{{url('/department/'.$department->id)}}" class="btn blue one">open</a></td>
                          </tr>
                          <?php $count++;?>
                         @endforeach
                    </tbody>
                  </table>

                  {{$departments->links()}}

                </div>
            </div>

          </div>
          <!--//graph-visual-->
        </div>
        <!--//outer-wp-->
  @endsection
