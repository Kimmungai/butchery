@extends('layouts.admin')

@section('content')
<h2>trashed users</h2>
<table class="table table-light">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">First</th>
    <th scope="col">Last</th>
    <th scope="col">email</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
  <?php $count=1;?>

  @foreach ($trashedUsers as $user)
    <tr>
      <th scope="row">{{$count}}</th>
      <td>{{$user->firstName}}</td>
      <td>{{$user->lastName}}</td>
      <td>{{$user->email}}</td>
      <td><a href="{{url('/trashed-user/'.$user->id)}}" class="btn btn-outline-dark">open</a></td>
    </tr>
    <?php $count++;?>
   @endforeach

</tbody>
</table>

@endsection
