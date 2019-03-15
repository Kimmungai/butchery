@extends('layouts.admin')

@section('content')

<form  action="{{url('create-category')}}" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  @component( 'components.category-edit-form', ['allDepartments'=>$allDepartments] )

  @endcomponent
  
  <button class="btn btn-success" type="submit" name="submit">Save</button>

</form>

@endsection
