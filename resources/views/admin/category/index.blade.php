@extends('layouts.admin')

  @section('content')
  <!--outter-wp-->
    <div class="outter-wp">
        <!--sub-heard-part-->
          <div class="sub-heard-part">
           <ol class="breadcrumb m-b-0">
            <li><a href="{{url('/admin')}}">Home</a></li>
            <li class="active">All Categories</li>
          </ol>
           </div>
        <!--//sub-heard-part-->
        <div class="graph-visual tables-main">

            <h3 class="inner-tittle two">Categories </h3>
                <div class="graph">
                <div class="tables">

                  <table class="table table-bordered">
                    <thead>
                      <tr> <th>#</th> <th>Image</th> <th>Name</th> <th>Action</th> </tr>
                    </thead>
                    <tbody>
                      <?php $count=1;?>
                        @foreach ($categories as $category)
                          <tr>
                            <th scope="row">{{$count}}</th>
                            <td><img src="{{$category->img}}" alt="{{$category->name}}" height="50" width="50"> </td>
                            <td>{{$category->name}}</td>
                            <td><a href="{{url('/category/'.$category->id)}}" class="btn blue one">open</a></td>
                          </tr>
                          <?php $count++;?>
                        @endforeach
                    </tbody>
                  </table>

                  {{$categories->links()}}

                </div>
            </div>

          </div>
          <!--//graph-visual-->
        </div>
        <!--//outer-wp-->
  @endsection
