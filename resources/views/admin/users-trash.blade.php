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

<h3>Trashed users</h3>

<table class="table table-light">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Avatar</th>
    <th scope="col">Name</th>
    <th scope="col">email</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
  <?php $count=1;?>

  @foreach ($trashedUsers as $user)
    <tr>
      <th scope="row">{{$count}}</th>
      <td> <img src="{{$user->avatar}}" alt="{{$user->name}}" height="50" width="50"> </td>
      <td>{{$user->firstName}} {{$user->lastName}}</td>
      <td>{{$user->email}}</td>
      <td><a href="{{url('/trashed-user/'.$user->id)}}" class="btn blue one">open</a></td>
    </tr>
    <?php $count++;?>
   @endforeach

</tbody>
</table>
</div>
@endsection
