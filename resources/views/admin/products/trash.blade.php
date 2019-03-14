@extends('layouts.admin')

@section('content')

<table class="table table-dark">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Image</th>
    <th scope="col">Name</th>
    <th scope="col">Deleted on</th>
    <th scope="col">SKU</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
  <?php $count=1;?>
      @foreach ($products as $product)
        <tr>
          <th scope="row">{{$count}}</th>
          <td><img src="{{$product->img1}}" alt="{{$product->name}}" height="50" width="50"></td>
          <td>{{$product->name}}</td>
          <td>{{$product->deleted_at}}</td>
          <td>{{$product->sku}}</td>
          <td><a href="{{url('/trashed-product/'.$product->id)}}" class="btn btn-outline-dark">open</a></td>
        </tr>
        <?php $count++;?>
       @endforeach

</tbody>
</table>


@endsection
