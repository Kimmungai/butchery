@extends('layouts.admin')

@section('content')
<form  action="{{url('create-department')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <select name="supermarket_id">

      @if( isset ($allSupermarkets) )

        @foreach ( $allSupermarkets as $supermarket )
          <option value="{{$supermarket->id}}">{{$supermarket->name}}</option>
        @endforeach

      @endif

    </select>

    @component( 'components.department-edit-form', [] )

    @endcomponent

    <button class="btn btn-success" type="submit" name="submit">Save</button>
  </form>


@endsection
