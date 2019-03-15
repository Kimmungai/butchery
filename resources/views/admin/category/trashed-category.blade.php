@extends('layouts.admin')

@section('content')
<table class="table table-dark">
<tbody>

  <tr>
    <th scope="row">Image</th>
    <td> <img src="@if( isset($category) ) {{$category->img}} @endif" alt="@if( isset($category) ) {{$category->name}} @endif" width="50" height="50"> </td>

  </tr>

  <tr>
    <th scope="row">Department</th>
    <td>
        @if( isset($allDepartments) )
          @foreach( $allDepartments as $department )
          {{$department->name}}<br>
          @endforeach
        @endif
    </td>

  </tr>

  <tr>
    <th scope="row">Name</th>
    <td>  @if( isset($category) ) {{$category->name}} @endif</td>
  </tr>

  <tr>
    <th scope="row">Description</th>
    <td> @if( isset($category) ) {{$category->description}} @endif</td>
  </tr>

</tbody>

</table>
<a class="btn btn-success" href="/restore-category/{{$category->id}}" name="button">Restore</a>
<a class="btn btn-danger" href="/remove-category/{{$category->id}}" name="button">Delete permanently</a>

@endsection
