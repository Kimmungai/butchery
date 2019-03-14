@extends('layouts.admin')

@section('content')

<table class="table table-dark">

<tbody>

  <tr>
    <th scope="row">Name</th>
    <td> @if($department) {{$department->name}} @endif</td>

  </tr>

  <tr>
    <th scope="row">Type</th>
    <td>
        @if($department->type == 1) Type 1 @endif
        @if($department->type == 2) Type 2 @endif
    </td>

  </tr>

</tbody>
</table>

<a class="btn btn-success" href="/restore-department/{{$department->id}}" name="button">Restore Department</a>
<a class="btn btn-danger" href="/remove-department/{{$department->id}}" name="button">Delete permanently</a>

@endsection
