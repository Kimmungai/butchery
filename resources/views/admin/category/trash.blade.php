@extends('layouts.admin')

@section('content')
<h2>trashed categories</h2>
<table class="table table-dark">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Image</th>
    <th scope="col">Name</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
  <?php $count=1;?>

  @foreach ($categories as $category)
    <tr>
      <th scope="row">{{$count}}</th>
      <td><img src="{{$category->img}}" alt="{{$category->name}}" height="50" width="50"> </td>
      <td>{{$category->name}}</td>
      <td><a href="{{url('/trashed-category/'.$category->id)}}" class="btn btn-outline-dark">open</a></td>
    </tr>
    <?php $count++;?>
  @endforeach

</tbody>
</table>

@endsection
