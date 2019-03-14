<table class="table table-dark">

<tbody>

  <tr>
    <th scope="row">Name</th>
    <td> <input class="form-control" type="text" name="name" value="@if(old('name')) {{old('name')}} @elseif(isset($department)) {{$department->name}} @endif"></td>
    <td>
      @if ($errors->has('name'))
        <span  role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
      @endif
   </td>
  </tr>

  <tr>
    <th scope="row">Type</th>
    <td>
      <select class="form-control" name="type">
        <option value="1" @if(old('type')==1) selected @elseif( isset($department) && $department->type == 1) selected @endif>Type 1</option>
        <option value="2" @if(old('type')==2) selected @elseif( isset($department) && $department->type == 2) selected @endif>Type 2</option>
      </select>
    </td>
    <td>
      @if ($errors->has('type'))
        <span  role="alert">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
      @endif
   </td>
  </tr>

</tbody>
</table>
