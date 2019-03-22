<!--Admin data starts here-->
  <h3>Admin</h3>

  <div class="form-group">
    <label for="selector1" class="col-sm-2 control-label">Job Id</label>
    <div class="col-sm-8">
      <input name="adminJobId" type="text" class="form-control1" id="adminJobId" value="@if( old('adminJobId') ) {{old('adminJobId')}} @elseif( isset($user) ) {{$user->admin->jobId}} @endif" placeholder="Job Id...">

      @if ($errors->has('adminJobId'))
          <span  role="alert">
              <strong>{{ $errors->first('adminJobId') }}</strong>
          </span>
      @endif
  </div>
  </div>


<div class="form-group">
  <label for="selector1" class="col-sm-2 control-label">Department</label>
  <div class="col-sm-8">
    <select name="adminDepartmentId" id="adminDepartmentId" class="form-control1">
      <option selected disabled>Choose one</option>
      @if( isset($userSupermarkets) )
        @foreach($userSupermarkets as $supermarket)
          @foreach ($supermarket->department as $department)
            <option value="{{$department->id}}" @if ( old('adminDepartmentId') == $department->id || (isset($user) && $user->admin->departmentId == $department->id) ) selected @endif>{{$department->name}}</option>
          @endforeach
        @endforeach
      @endif
    </select>
    @if ($errors->has('adminDepartmentId'))
        <span  role="alert">
            <strong>{{ $errors->first('adminDepartmentId') }}</strong>
        </span>
    @endif
</div>
</div>




<!--Admin data ends here-->
