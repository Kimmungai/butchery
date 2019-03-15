<table class="table table-dark">
<tbody>

  <tr>
    <th scope="row">Image</th>
    <td> <img src="@if( isset($category) ) {{$category->img}} @endif" alt="@if( isset($category) ) {{$category->name}} @endif" width="50" height="50"> <input type="file" name="img" > </td>
    <td>
      @if ($errors->has('img'))
          <span  role="alert">
              <strong>{{ $errors->first('img') }}</strong>
          </span>
      @endif
    </td>
  </tr>

  <tr>
    <th scope="row">Department</th>
    <td>
      <select name="department_id">
        @if( isset($allDepartments) )
          @foreach( $allDepartments as $department )
            <option value="{{$department->id}}" @if( old('department_id') == $department->id ) selected @elseif( isset($category) && $category->department_id == $department->id ) selected @endif> {{$department->name}}</option>
          @endforeach
        @endif
      </select>
    </td>
    <td>
      @if ($errors->has('department_id'))
          <span  role="alert">
              <strong>{{ $errors->first('department_id') }}</strong>
          </span>
      @endif
    </td>
  </tr>

  <tr>
    <th scope="row">Name</th>
    <td>  <input class="form-control" type="text" name="name" value="@if(old('name')) {{old('name')}} @elseif( isset($category) ) {{$category->name}} @endif" > </td>
    <td>
      @if ($errors->has('name'))
          <span  role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </td>
  </tr>

  <tr>
    <th scope="row">Description</th>
    <td>  <textarea class="form-control"  name="description" rows="5">@if(old('description')) {{old('description')}} @elseif( isset($category) ) {{$category->description}} @endif</textarea></td>
    <td>
      @if ($errors->has('description'))
          <span  role="alert">
              <strong>{{ $errors->first('description') }}</strong>
          </span>
      @endif
    </td>
  </tr>

</tbody>

</table>
