@extends('layouts.admin')

@section('content')
<div class="outter-wp">
  <!--sub-heard-part-->
    <div class="sub-heard-part">
     <ol class="breadcrumb m-b-0">
      <li><a href="{{url('/admin')}}">Home</a></li>
      <li><a href="{{url('/categories')}}">All Categories</a></li>
      <li class="active">Category</li>
    </ol>
     </div>
  <!--//sub-heard-part-->
  <div class="set-1">
  <div class="graph-2 general">
  <div class="form-body">

    <form class="form-horizontal" action="{{url('update-category')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="category_id" value="@if( isset($category) ) {{$category->id}} @endif">
    {{csrf_field()}}

    @component( 'components.category-edit-form', ['category'=>$category,'allDepartments'=>$allDepartments] )

    @endcomponent

    <button class="btn btn-success" type="submit" name="submit">Update</button>
    <a class="btn btn-danger" href="/delete-category/{{$category->id}}" name="button">Soft delete</a>
    </form>

 </div>
</div>
</div>
</div>
@endsection
