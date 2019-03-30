@extends('layouts.admin')

@section('content')
<div class="outter-wp">
  <!--sub-heard-part-->
    <div class="sub-heard-part">
     <ol class="breadcrumb m-b-0">
      <li><a href="{{url('/admin')}}">Home</a></li>
      <li><a href="{{url('/products')}}">All items</a></li>
      <li class="active">New</li>
    </ol>
     </div>
  <!--//sub-heard-part-->
  <div class="set-1">
  <div class="graph-2 general">
  <div class="form-body">
<form  class="form-horizontal" action="/create-product" method="post" enctype="multipart/form-data">

    {{csrf_field()}}

    @component( 'components.product-edit-form', ["allSupermarket"=>$allSupermarket,"allCategories"=>$allCategories] )

    @endcomponent

    <button class="btn btn-success" type="submit" name="submit">Save</button>
</form>
</div>

</div>
</div>
</div>

@endsection
