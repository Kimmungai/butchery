<!--staff data starts here-->
  <h1>Register Staff</h1>

  <div class="form-group col-md-4">
    <label for="type">Staff type</label>
    <select name="type" id="staffType" class="form-control">
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

  <div class="form-group col-md-12">
    <label for="staffJobId">Job Id</label>
    <input name="staffJobId" type="text" class="form-control" id="staffJobId" value="@if ( old('staffJobId') ) {{old('staffJobId')}} @elseif( isset($user) ) {{$user->staff->jobId}} @endif" placeholder="Job Id...">
    @if ($errors->has('staffJobId'))
        <span  role="alert">
            <strong>{{ $errors->first('staffJobId') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group col-md-4">
    <label for="satffDepartmentId">Department</label>
    <select name="staffDepartmentId" id="staffDepartmentId" class="form-control">
      <option selected disabled>Choose one</option>
      @foreach($userSupermarkets as $supermarkets)
        @foreach($supermarkets as $supermarket)
          @foreach ($supermarket->department as $department)
            <option value="{{$department->id}}" @if ( old('staffDepartmentId') == $department->id || (isset($user) && $user->staff->departmentId == $department->id) ) selected @endif>{{$department->name}}</option>
          @endforeach
        @endforeach
      @endforeach
    </select>
    @if ($errors->has('staffDepartmentId'))
        <span  role="alert">
            <strong>{{ $errors->first('staffDepartmentId') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="availability">Available?</label>
    Yes: <input name="availability" type="radio" value="1" @if( old('availability') == 1 || (isset($user) && $user->staff->availability == 1) )  checked @endif>
    No: <input name="availability" type="radio" value="-1" @if( old('availability') == -1  || (isset($user) && $user->staff->availability == -1)) checked @endif>
    @if ($errors->has('availability'))
        <span  role="alert">
            <strong>{{ $errors->first('availability') }}</strong>
        </span>
    @endif
  </div>


<!--staff data ends here-->
