@extends('layouts.admin')

@section('content')
<!--outter-wp-->
  <div class="outter-wp">
    <!--sub-heard-part-->
      <div class="sub-heard-part">
       <ol class="breadcrumb m-b-0">
        <li><a href="{{url('/admin')}}">Home</a></li>
        <li class="active">Trashed users</li>
      </ol>
       </div>
    <!--//sub-heard-part-->

<h3>Trashed user</h3>

<table class="table ">
  <tbody>
    <tr>
      <td>Avatar</td>
      <td>
        <img src="@if( isset($user) ){{$user->avatar}} @endif" alt="@if( isset($user) ){{$user->name}} @endif" class="img-thumbnail" height="50px" width="50px">
    </tr>

    <tr>
      <td>Username</td>
      <td>@if( isset($user) ) {{$user->name}} @endif</td>
    </tr>

    <tr>
      <td>First name</td>
      <td>@if( isset($user) ) {{$user->firstName}} @endif</td>

    </tr>

    <tr>
      <td>Middle name</td>
      <td>@if( isset($user) ) {{$user->middleName}} @endif</td>

    </tr>

    <tr>
      <td>Last name</td>
      <td>@if( isset($user) ) {{$user->lastName}} @endif</td>

    </tr>

    <tr>
      <td>DOB</td>
      <td>@if( isset($user) ) {{$user->DOB}} @endif</td>

    </tr>

    <tr>
      <td>Email</td>
      <td>@if( isset($user) ) {{$user->email}} @endif</td>

    </tr>

    <tr>
      <td>Phone Number</td>
      <td>@if( isset($user) ) {{$user->phoneNumber}} @endif</td>

    </tr>

    <tr>
      <td>Gender</td>
      <td>
         @if(  ( isset($user) && $user->gender == 1 ) ) Male @endif
         @if( ( isset($user) && $user->gender == 2 ) ) Female @endif
    </td>

    </tr>

    <tr>
      <td>Address</td>
      <td>@if( isset($user) ) {{$user->address}} @endif</td>

    </tr>

    <tr>
      <td>ID No.</td>
      <td>@if( isset($user) ) {{$user->idNo}} @endif</td>

    </tr>

    <tr>
      <td>ID scan.</td>
      <td>
        <img src="@if( isset($user) ){{$user->idImage}} @endif" alt="@if( isset($user) ){{$user->name}} @endif" class="img-thumbnail" height="50px" width="50px">
      </td>

    </tr>

    <tr>
      <td>Passport No.</td>
      <td>@if( isset($user) ) {{$user->passport}} @endif</td>

    </tr>

    <tr>
      <td>Passport scan.</td>
      <td>
        <img src="@if( isset($user) ){{$user->passportImage}} @endif" alt="@if( isset($user) ){{$user->name}} @endif" class="img-thumbnail" height="50px" width="50px">
      </td>
    </tr>

  </tbody>
</table>
<a class="btn btn-success" href="/restore-user/{{$user->id}}" name="button">Restore User</a>
<a class="btn btn-danger" href="/remove-user/{{$user->id}}" name="button">Delete permanently</a>
</div>

@endsection
