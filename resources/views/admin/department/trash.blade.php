@extends('layouts.admin')

@section('content')

<table class="table table-dark">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Type</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
  <?php $count=1;?>
      @foreach ($trashedDepartements as $department)
        <tr>
          <th scope="row">{{$count}}</th>
          <td>{{$department->name}}</td>
          <td>Type {{$department->type}}</td>
          <td><a href="{{url('/trashed-department/'.$department->id)}}" class="btn btn-outline-dark">open</a></td>
        </tr>
        <?php $count++;?>
       @endforeach

</tbody>
</table>


@endsection
