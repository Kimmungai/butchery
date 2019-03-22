@extends('layouts.admin')
  @section('content')
  <div class="outter-wp">
    <!--sub-heard-part-->
      <div class="sub-heard-part">
       <ol class="breadcrumb m-b-0">
        <li><a href="{{url('/admin')}}">Home</a></li>
        @if( isset($user) )
          @if( $user->customer )
            <li><a href="{{url('/customers')}}">All customers</a></li>
            <li class="active">{{$user->firstName}} {{$user->lastName}}</li>
          @elseif( $user->staff )
          <li><a href="{{url('/staff')}}">All staff</a></li>
            <li class="active">{{$user->firstName}} {{$user->lastName}}</li>
          @elseif( $user->admin )
          <li><a href="{{url('/admins')}}">All Administrators</a></li>
            <li class="active">{{$user->firstName}} {{$user->lastName}}</li>
          @endif
        @endif
      </ol>
       </div>
    <!--//sub-heard-part-->
    <div class="set-1">
    <div class="graph-2 general">
    <div class="form-body">
      <form class="form-horizontal" action="{{url('/update-user')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        @if( $user->staff )
          <input id="user_type" type="hidden" name="user_type" value="staff">
          <input id="user_id" type="hidden" name="user_id" value="{{$user->id}}">


          @component( 'components.staff-edit-form', [ 'user' => $user, "userSupermarkets" => $userSupermarkets] )

          @endcomponent

        @elseif( $user->admin )
          <input id="user_type" type="hidden" name="user_type" value="admin">
          <input id="user_id" type="hidden" name="user_id" value="{{$user->id}}">


            @component( 'components.admin-edit-form', ['user' => $user, "userSupermarkets" => $userSupermarkets] )

            @endcomponent

        @else
          <input id="user_type" type="hidden" name="user_type" value="customer">
          <input id="user_id" type="hidden" name="user_id" value="{{$user->id}}">


            @component( 'components.customer-edit-form', ['user' => $user, "userSupermarkets" => $userSupermarkets] )

            @endcomponent

        @endif


        @component( 'components.user-edit-form', ['user' => $user, "userSupermarkets" => $userSupermarkets ] )

        @endcomponent

        <button class="btn btn-primary" type="submit" name="button">Update</button>
        <a class="btn btn-danger" href="/delete-user/{{$user->id}}" name="button">Delete</a>
      </form>
    </div>

    </div>
    </div>
  </div>

  @endsection
