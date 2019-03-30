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
<form class="form-horizontal" action="{{url('create-department')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
      <label for="selector1" class="col-sm-2 control-label">Organisation</label>
      <div class="col-sm-8">
        <select class="form-control1" name="supermarket_id">

          @if( isset ($userSupermarkets) )

            @foreach ( $userSupermarkets as $supermarket )
              <option value="{{$supermarket->id}}">{{$supermarket->name}}</option>
            @endforeach

          @endif

        </select>
    </div>
    </div>

    @component( 'components.department-edit-form', [] )

    @endcomponent

    <button class="btn btn-success" type="submit" name="submit">Save</button>
  </form>
</div>
</div>
</div>
</div>

@endsection
