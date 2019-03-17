
  <table class="table table-dark table-bordered table-hover">
    <tbody>

      <tr>
        <td>Avatar</td>
        <td>
          <img src="@if( isset($user) ){{$user->avatar}} @endif" alt="@if( isset($user) ){{$user->name}} @endif" class="img-thumbnail" height="50px" width="50px">
          <input name="avatar" id="avatar" type="file"   /></td>
        <td>@if ($errors->has('avatar'))
            <span  role="alert">
                <strong>{{ $errors->first('avatar') }}</strong>
            </span>
        @endif</td>
      </tr>


      <tr>
        <td>Username</td>
        <td><input name="name" id="name" type="text" class="form-control" value="@if( old('name') ) {{old('name')}} @elseif( isset($user) ) {{$user->name}} @endif" placeholder="Username..." /></td>
      <td>@if ($errors->has('name'))
            <span  role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>Password</td>
        <td><input name="password" id="password" type="text" class="form-control" value="@if( old('password') ) {{old('password')}}  @endif" placeholder="Password..." /></td>
      <td>@if ($errors->has('password'))
            <span  role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>First name</td>
        <td><input name="firstName" id="firstName" type="text" class="form-control" value="@if( old('firstName') ) {{old('firstName')}} @elseif( isset($user) ) {{$user->firstName}} @endif" placeholder="First Name..." /></td>
        <td>@if ($errors->has('firstName'))
            <span  role="alert">
                <strong>{{ $errors->first('firstName') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>Middle name</td>
        <td><input name="middleName" id="middleName" type="text" class="form-control" value="@if( old('middleName') ) {{old('middleName')}} @elseif( isset($user) ) {{$user->middleName}} @endif" placeholder="Middle Name..." /></td>
      <td>@if ($errors->has('middleName'))
            <span  role="alert">
                <strong>{{ $errors->first('middleName') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>Last name</td>
        <td><input name="lastName" id="lastName" type="text" class="form-control" value="@if( old('lastName') ) {{old('lastName')}} @elseif( isset($user) ) {{$user->lastName}} @endif" placeholder="Last name..." /></td>
      <td>@if ($errors->has('lastName'))
            <span  role="alert">
                <strong>{{ $errors->first('lastName') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>DOB</td>
        <td><input name="DOB" id="DOB" type="text" class="form-control" value="@if( old('DOB') ) {{old('DOB')}} @elseif( isset($user) ) {{$user->DOB}} @endif" placeholder="yy-mm-dd" /></td>
        <td>@if ($errors->has('DOB'))
            <span  role="alert">
                <strong>{{ $errors->first('DOB') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>Email</td>
        <td><input name="email" id="email" type="text" class="form-control" value="@if( old('email') ) {{old('email')}} @elseif( isset($user) ) {{$user->email}} @endif" placeholder="Email..." /></td>
        <td>@if ($errors->has('email'))
            <span  role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>Phone Number</td>
        <td><input name="phoneNumber" id="phoneNumber" type="text" class="form-control" value="@if( old('phoneNumber') ) {{old('phoneNumber')}} @elseif( isset($user) ) {{$user->phoneNumber}} @endif" placeholder="Phone Number..." /></td>
        <td>@if ($errors->has('phoneNumber'))
            <span  role="alert">
                <strong>{{ $errors->first('phoneNumber') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>Gender</td>
        <td>
            <select name="gender" id="gender" class="form-control">
            <option selected disabled>Choose one</option>
            <option value="1" @if( old('gender') == 1 || ( isset($user) && $user->gender == 1 ) ) selected @endif>Male</option>
            <option value="2" @if( old('gender') == 2 || ( isset($user) && $user->gender == 2 ) ) selected @endif>Female</option>
          </select>

      </td>
        <td>
          @if ($errors->has('gender'))
            <span  role="alert">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
         @endif
      </td>
      </tr>

      <tr>
        <td>Supermarket</td>
        <td>
          <select name="supermarket_id" id="supermarket_id" class="form-control" onchange="refresh_departments(this.value,['staffDepartmentId','adminDepartmentId'])">
            <option selected disabled>Choose one</option>
              @foreach($userSupermarkets as $supermarket)
                <option value="{{$supermarket->id}}" @if ( old('supermarket_id') == $supermarket->id  ) selected @else selected @endif>{{$supermarket->name}}</option>
              @endforeach
          </select>

      </td>
        <td>
          @if ($errors->has('supermarket_id'))
              <span  role="alert">
                  <strong>{{ $errors->first('supermarket_id') }}</strong>
              </span>
          @endif
      </td>
      </tr>

      <tr>
        <td>Address</td>
        <td><input name="address" id="address" type="text" class="form-control" value="@if( old('address') ) {{old('address')}} @elseif( isset($user) ) {{$user->address}} @endif" placeholder="Address..." /></td>
        <td>@if ($errors->has('address'))
            <span  role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>ID No.</td>
        <td><input name="idNo" id="idNo" type="text" class="form-control" value="@if( old('idNo') ) {{old('idNo')}} @elseif( isset($user) ) {{$user->idNo}} @endif" placeholder="ID No..." /></td>
        <td>@if ($errors->has('idNo'))
            <span  role="alert">
                <strong>{{ $errors->first('idNo') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>ID scan.</td>
        <td>
          <img src="@if( isset($user) ){{$user->idImage}} @endif" alt="@if( isset($user) ){{$user->name}} @endif" class="img-thumbnail" height="50px" width="50px">
          <input name="idImage" id="idImage" type="file" value=""  /></td>
        <td>@if ($errors->has('idImage'))
            <span  role="alert">
                <strong>{{ $errors->first('idImage') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>Passport No.</td>
        <td><input name="passport" id="passport" type="text" class="form-control" value="@if( old('passport') ) {{old('passport')}} @elseif( isset($user) ) {{$user->passport}} @endif" placeholder="Passport No..." /></td>
        <td>@if ($errors->has('passport'))
            <span  role="alert">
                <strong>{{ $errors->first('passport') }}</strong>
            </span>
        @endif</td>
      </tr>

      <tr>
        <td>Passport scan.</td>
        <td>
          <img src="@if( isset($user) ){{$user->passportImage}} @endif" alt="@if( isset($user) ){{$user->name}} @endif" class="img-thumbnail" height="50px" width="50px">
          <input name="passportImage" id="passportImage" type="file"   /></td>
        <td>@if ($errors->has('passportImage'))
            <span  role="alert">
                <strong>{{ $errors->first('passportImage') }}</strong>
            </span>
        @endif</td>
      </tr>

    </tbody>
  </table>
