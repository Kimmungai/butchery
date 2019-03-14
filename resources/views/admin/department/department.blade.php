@extends('layouts.admin')

@section('content')
<form  action="{{url('update-department')}}" method="post" enctype="multipart/form-data">

    {{csrf_field()}}

    @if( isset($department) )
      @foreach( $department->category as $category )
        <?php $departmentCategoriesIds[] = $category->id;  ?>
      @endforeach
    @endif

    <input type="hidden" name="department_id" value="{{$department->id}}">
    <input type="hidden" name="supermarket_id" value="{{$department->supermarket_id}}">

    @component( 'components.department-edit-form', ["department" => $department] )

    @endcomponent
    <button class="btn btn-success" type="submit" name="submit">Update</button>
    <a class="btn btn-danger" href="/delete-department/{{$department->id}}" name="button">Soft delete</a>
  </form>


@endsection
