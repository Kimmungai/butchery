<form class="" action="{{url('/update-user')}}" method="post">
  {{csrf_field()}}
  @if( $userType === 'staff' )
    <input id="user_type" type="hidden" name="user_type" value="staff">


  @elseif( $userType === 'admin' )
    <input id="user_type" type="hidden" name="user_type" value="admin">
  @else
    <input id="user_type" type="hidden" name="user_type" value="customer">
    <!--customer data starts here-->
      <h1>Register Customer</h1>

      <div class="form-group col-md-4">
        <label for="type">Customer type</label>
        <select name="type" id="customerType" class="form-control">
          <option selected disabled>Choose one</option>
          <option value="1" @if( old('type')==1 ) selected @endif>High value</option>
          <option value="2" @if( old('type')==2 ) selected @endif>Low value</option>
        </select>
        @if ($errors->has('type'))
            <span  role="alert">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
      </div>
    <!--customer data ends here-->
  @endif
  <table class="table table-dark table-bordered table-hover">
    <tbody>

      <tr>
        <td>Username</td>
        <td><input name="name" type="text" class="form-control" value="@if( old('name') ) {{old('name')}} @else {{$name}} @endif" /></td>
        @if ($errors->has('name'))
            <span  role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </tr>

      <tr>
        <td>First name</td>
        <td><input name="firstName" type="text" class="form-control" value="@if( old('firstName') ) {{old('firstName')}} @else {{$firstName}} @endif" /></td>
        @if ($errors->has('firstName'))
            <span  role="alert">
                <strong>{{ $errors->first('firstName') }}</strong>
            </span>
        @endif
      </tr>

      <tr>
        <td>Middle name</td>
        <td><input name="middleName" type="text" class="form-control" value="{{$middleName}}" /></td>
        @if ($errors->has('middleName'))
            <span  role="alert">
                <strong>{{ $errors->first('middleName') }}</strong>
            </span>
        @endif
      </tr>

      <tr>
        <td>Last name</td>
        <td><input name="lastName" type="text" class="form-control" value="{{$lastName}}" /></td>
        @if ($errors->has('lastName'))
            <span  role="alert">
                <strong>{{ $errors->first('lastName') }}</strong>
            </span>
        @endif
      </tr>

    </tbody>
  </table>
  <button class="btn btn-primary" type="submit" name="button">Update</button>
</form>
