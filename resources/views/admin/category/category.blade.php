@extends('layouts.admin')

@section('content')
<form  action="{{url('update-category')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="category_id" value="@if( isset($category) ) {{$category->id}} @endif">
{{csrf_field()}}

@component( 'components.category-edit-form', ['category'=>$category,'allDepartments'=>$allDepartments] )

@endcomponent

<button class="btn btn-success" type="submit" name="submit">Update</button>
<a class="btn btn-danger" href="/delete-category/{{$category->id}}" name="button">Soft delete</a>
</form>
@endsection
