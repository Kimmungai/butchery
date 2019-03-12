<!--Admin data starts here-->
  <h1>Register Admin</h1>

  <div class="form-group col-md-12">
    <label for="adminJobId">Job Id</label>
    <input name="adminJobId" type="text" class="form-control" id="adminJobId" value="@if( old('adminJobId') ) {{old('adminJobId')}} @else {{$user->admin->jobId}} @endif" placeholder="Job Id...">
    @if ($errors->has('adminJobId'))
        <span  role="alert">
            <strong>{{ $errors->first('adminJobId') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group col-md-4">
    <label for="adminDepartmentId">Department</label>
    <select name="adminDepartmentId" id="adminDepartmentId" class="form-control">
      <option selected disabled>Choose one</option>
      @foreach($userSupermarkets as $supermarkets)
        @foreach($supermarkets as $supermarket)
          @foreach ($supermarket->department as $department)
            <option value="{{$department->id}}" @if ( old('adminDepartmentId') == $department->id || (isset($user) && $user->admin->departmentId == $department->id) ) selected @endif>{{$department->name}}</option>
          @endforeach
        @endforeach
      @endforeach
    </select>
    @if ($errors->has('adminDepartmentId'))
        <span  role="alert">
            <strong>{{ $errors->first('adminDepartmentId') }}</strong>
        </span>
    @endif
  </div>

<!--Admin data ends here-->
