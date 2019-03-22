@extends('layouts.admin')

@section('content')
<div class="outter-wp">
  <!--sub-heard-part-->
    <div class="sub-heard-part">
     <ol class="breadcrumb m-b-0">
      <li><a href="{{url('/admin')}}">Home</a></li>
      <li><a href="{{url('/departments')}}">All departments</a></li>
      <li class="active">Department</li>
    </ol>
     </div>
  <!--//sub-heard-part-->
  <div class="set-1">
  <div class="graph-2 general">
  <div class="form-body">
    <form class="form-horizontal" action="{{url('update-department')}}" method="post" enctype="multipart/form-data">

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
        <a class="btn btn-danger" href="/delete-department/{{$department->id}}" name="button">Delete</a>
    </form>
  </div>
 </div>
 </div>
</div>


@endsection
