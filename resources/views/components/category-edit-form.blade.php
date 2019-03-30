<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Image</label>
  <div class="col-sm-8">
    <img src="@if( isset($category) ) {{$category->img}} @endif" alt="@if( isset($category) ) {{$category->name}} @endif" width="50" height="50"> <input type="file" name="img" >
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('img'))
          <span  role="alert">
              <strong>{{ $errors->first('img') }}</strong>
          </span>
      @endif
  </p>
  </div>
</div>

<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Department</label>
  <div class="col-sm-8">
    <select name="department_id" id="department_id" class="form-control1">
      @if( isset($allDepartments) )
        @foreach( $allDepartments as $department )
          <option value="{{$department->id}}" @if( old('department_id') == $department->id ) selected @elseif( isset($category) && $category->department_id == $department->id ) selected @endif> {{$department->name}}</option>
        @endforeach
      @endif
    </select>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('department_id'))
          <span  role="alert">
              <strong>{{ $errors->first('department_id') }}</strong>
          </span>
      @endif
  </p>
  </div>
</div>

<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-8">
    <input class="form-control1" type="text" name="name" value="@if(old('name')) {{old('name')}} @elseif( isset($category) ) {{$category->name}} @endif" >
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('name'))
          <span  role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
  </p>
  </div>
</div>

<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Featured</label>
  <div class="col-sm-8">
      <select class="form-control1" name="featured">
        <option value="0" @if (old('featured') == 0) selected @elseif( isset($category) && $category->featured== 0 && old('featured') == null ) selected @endif>No</option>
        <option value="1" @if (old('featured') == 1) selected @elseif( isset($category) && $category->featured== 1 && old('featured') == null ) selected @endif>Yes</option>
      <select>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('featured'))
        <span  role="alert">
            <strong>{{ $errors->first('featured') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>

<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Description</label>
  <div class="col-sm-8">
    <textarea class="form-control"  name="description" rows="5">@if(old('description')) {{old('description')}} @elseif( isset($category) ) {{$category->description}} @endif</textarea>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('description'))
          <span  role="alert">
              <strong>{{ $errors->first('description') }}</strong>
          </span>
      @endif
  </p>
  </div>
</div>
