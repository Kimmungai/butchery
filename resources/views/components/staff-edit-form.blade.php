<!--staff data starts here-->
  <h3>Staff</h3>

  <div class="form-group">
    <label for="selector1" class="col-sm-2 control-label">Staff type</label>
    <div class="col-sm-8">
      <select name="type" id="staffType" class="form-control1">
        <option selected disabled>Choose one</option>
        <option value="1" @if( old('type')==1 || (isset($user) && $user->staff->type == 1) ) selected @endif>Type 1</option>
        <option value="2" @if( old('type')==2 || (isset($user) && $user->staff->type == 2) ) selected @endif>Type 2</option>
      </select>
    @if ($errors->has('type'))
        <span  role="alert">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
  </div>
  </div>

  <div class="form-group">
    <label for="selector1" class="col-sm-2 control-label">Job Id</label>
    <div class="col-sm-8">
      <input name="staffJobId" type="text" class="form-control1" id="staffJobId" value="@if ( old('staffJobId') ) {{old('staffJobId')}} @elseif( isset($user) ) {{$user->staff->jobId}} @endif" placeholder="Job Id...">
      @if ($errors->has('staffJobId'))
          <span  role="alert">
              <strong>{{ $errors->first('staffJobId') }}</strong>
          </span>
      @endif
  </div>
  </div>

  <div class="form-group">
    <label for="selector1" class="col-sm-2 control-label">Department</label>
    <div class="col-sm-8">
      <select name="staffDepartmentId" id="staffDepartmentId" class="form-control1">
        <option selected disabled>Choose one</option>
        @if( isset( $userSupermarkets ) )
          @foreach($userSupermarkets as $supermarket)
            @foreach ($supermarket->department as $department)
              <option value="{{$department->id}}" @if ( old('staffDepartmentId') == $department->id || (isset($user) && $user->staff->departmentId == $department->id) ) selected @endif>{{$department->name}}</option>
            @endforeach
          @endforeach
        @endif
      </select>
      @if ($errors->has('staffDepartmentId'))
          <span  role="alert">
              <strong>{{ $errors->first('staffDepartmentId') }}</strong>
          </span>
      @endif
  </div>
  </div>



  <div class="form-group">
  	<label for="radio" class="col-sm-2 control-label">Available?</label>
  	<div class="col-sm-8">
  		<div class="radio-inline"><label><input name="availability" type="radio" value="1" @if( old('availability') == 1 || (isset($user) && $user->staff->availability == 1) )  checked @endif> Yes</label></div>
  		<div class="radio-inline"><label><input name="availability" type="radio" value="-1" @if( old('availability') == -1  || (isset($user) && $user->staff->availability == -1)) checked @endif> No</label></div>
      @if ($errors->has('availability'))
          <span  role="alert">
              <strong>{{ $errors->first('availability') }}</strong>
          </span>
      @endif
  	</div>
  </div>

<!--staff data ends here-->
