<div class="form-group">
  <label for="selector1" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-8">
    <input class="form-control1" type="text" name="name" value="@if(old('name')) {{old('name')}} @elseif(isset($department)) {{$department->name}} @endif">
    @if ($errors->has('name'))
      <span  role="alert">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
    @endif
</div>
</div>

<div class="form-group">
  <label for="selector1" class="col-sm-2 control-label">Type</label>
  <div class="col-sm-8">
    <select class="form-control1" name="type">
      <option value="1" @if(old('type')==1) selected @elseif( isset($department) && $department->type == 1) selected @endif>Type 1</option>
      <option value="2" @if(old('type')==2) selected @elseif( isset($department) && $department->type == 2) selected @endif>Type 2</option>
    </select>
    @if ($errors->has('type'))
      <span  role="alert">
          <strong>{{ $errors->first('type') }}</strong>
      </span>
    @endif
</div>
</div>
