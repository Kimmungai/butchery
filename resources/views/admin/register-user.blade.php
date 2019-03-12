@extends('layouts.admin')

@section('content')

<button type="button" class="btn btn-success btn-lg" onclick="show_sec(['register-sec','customer-data-form'],['staff-data-form','admin-data-form'],'customer')">Customer</button>
<button type="button" class="btn btn-primary btn-lg" onclick="show_sec(['register-sec','staff-data-form'],['customer-data-form','admin-data-form'],'staff')">Staff</button>
<button type="button" class="btn btn-secondary btn-lg" onclick="show_sec(['register-sec','admin-data-form'],['staff-data-form','customer-data-form'],'admin')">Admin</button>
<img src="http://localhost:8000/public/users/customers/avatars/uf0M2wPRcDQ010dSxGrUnASfBgiRNjVVIl8ltvNO.jpeg" alt="">
<section @if( session('userBeingRegistered') === null ) class="d-none" @endif id="register-sec">
  @if(count($errors))
  <h3 class="text-danger">Please correct errors in the form</h3>
  @endif

  <form action="{{url('/register-user')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    <!--customer data starts here-->
    <div @if( session('userBeingRegistered') != 'customer' ) class="d-none" @endif id="customer-data-form">
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
    </div>
    <!--customer data ends here-->

    <!--staff data starts here-->
    <div @if( session('userBeingRegistered') != 'staff' ) class="d-none" @endif id="staff-data-form">
      <h1>Register Staff</h1>

      <div class="form-group col-md-4">
        <label for="type">Staff type</label>
        <select name="type" id="staffType" class="form-control">
          <option selected disabled>Choose one</option>
          <option value="1" @if( old('type')==1 ) selected @endif>Type 1</option>
          <option value="2" @if( old('type')==2 ) selected @endif>Type 2</option>
        </select>
        @if ($errors->has('type'))
            <span  role="alert">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group col-md-12">
        <label for="staffJobId">Job Id</label>
        <input name="staffJobId" type="text" class="form-control" id="staffJobId" value="{{old('staffJobId')}}" placeholder="Job Id...">
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
                <option value="{{$department->id}}" @if ( old('staffDepartmentId') == $department->id ) selected @endif>{{$department->name}}</option>
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
        Yes: <input name="availability" type="radio" value="1" @if( old('availability') == 1 ) checked @endif>
        No: <input name="availability" type="radio" value="-1" @if( old('availability') == -1 ) checked @endif>
        @if ($errors->has('availability'))
            <span  role="alert">
                <strong>{{ $errors->first('availability') }}</strong>
            </span>
        @endif
      </div>


    </div>
    <!--staff data ends here-->

    <!--Admin data starts here-->
    <div @if( session('userBeingRegistered') != 'admin' ) class="d-none" @endif id="admin-data-form">
      <h1>Register Admin</h1>

      <div class="form-group col-md-12">
        <label for="adminJobId">Job Id</label>
        <input name="adminJobId" type="text" class="form-control" id="adminJobId" value="{{old('adminJobId')}}" placeholder="Job Id...">
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
                <option value="{{$department->id}}" @if ( old('adminDepartmentId') == $department->id ) selected @endif>{{$department->name}}</option>
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

    </div>
    <!--Admin data ends here-->


    <div class="form-group">
      @if( session('userBeingRegistered') === 'staff' )
        <input id="user_type" type="hidden" name="user_type" value="staff">
      @elseif( session('userBeingRegistered') === 'admin' )
        <input id="user_type" type="hidden" name="user_type" value="admin">
      @else
        <input id="user_type" type="hidden" name="user_type" value="customer">
      @endif

      <label for="password">Password</label>
      <input name="password" type="text" class="form-control" id="password" value="{{old('password')}}" placeholder="Password...">
      @if ($errors->has('password'))
          <span  role="alert">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="name">Username</label>
        <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Name...">
        @if ($errors->has('name'))
            <span  role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group col-md-12">
        <label for="email">Email</label>
        <input name="email" type="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Email...">
        @if ($errors->has('email'))
            <span  role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label for="firstName">First Name</label>
      <input name="firstName" type="text" class="form-control" id="firstName" value="{{old('firstName')}}" placeholder="First Name...">
      @if ($errors->has('firstName'))
          <span  role="alert">
              <strong>{{ $errors->first('firstName') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-group">
      <label for="middleName">Middle Name</label>
      <input name="middleName" type="text" class="form-control" id="middleName" value="{{old('middleName')}}" placeholder="Middle Name...">
      @if ($errors->has('middleName'))
          <span  role="alert">
              <strong>{{ $errors->first('middleName') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-group">
      <label for="lastName">Last Name</label>
      <input name="lastName" type="text" class="form-control" id="lastName" value="{{old('lastName')}}" placeholder="Last Name...">
      @if ($errors->has('lastName'))
          <span  role="alert">
              <strong>{{ $errors->first('lastName') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-group">
      <label for="DOB">DOB</label>
      <input name="DOB" type="date" class="form-control" id="DOB" value="{{old('DOB')}}" placeholder="DOB...">
      @if ($errors->has('DOB'))
          <span  role="alert">
              <strong>{{ $errors->first('DOB') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="phoneNumber">Phone Number</label>
        <input name="phoneNumber" type="number" class="form-control" id="phoneNumber" value="{{old('phoneNumber')}}" placeholder="Phone Number...">
        @if ($errors->has('phoneNumber'))
            <span  role="alert">
                <strong>{{ $errors->first('phoneNumber') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Gender</label>
        <select name="gender" id="gender" class="form-control">
          <option selected disabled>Choose one</option>
          <option value="1" @if( old('gender') == 1 ) selected @endif>Male</option>
          <option value="2" @if( old('gender') == 2 ) selected @endif>Female</option>
        </select>
        @if ($errors->has('gender'))
            <span  role="alert">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group col-md-4">
        <label for="supermarket_id">Supermarket</label>
        <select name="supermarket_id" id="supermarket_id" class="form-control" onchange="refresh_departments(this.value,['staffDepartmentId','adminDepartmentId'])">
          <option selected disabled>Choose one</option>
          @foreach($userSupermarkets as $supermarkets)
            @foreach($supermarkets as $supermarket)
              <option value="{{$supermarket->id}}" @if ( old('supermarket_id') == $supermarket->id ) selected @endif>{{$supermarket->name}}</option>
            @endforeach
          @endforeach
        </select>
        @if ($errors->has('supermarket_id'))
            <span  role="alert">
                <strong>{{ $errors->first('supermarket_id') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group col-md-6">
        <label for="address">Address</label>
        <input name="address" type="text" class="form-control" id="address" value="{{old('address')}}">
        @if ($errors->has('address'))
            <span  role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group col-md-6">
        <label for="avatar">avatar</label>
        <input name="avatar" type="file" class="form-control" id="avatar" value="{{old('avatar')}}">
        @if ($errors->has('avatar'))
            <span  role="alert">
                <strong>{{ $errors->first('avatar') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group col-md-6">
        <label for="idNo">Id No</label>
        <input name="idNo" type="text" class="form-control" id="idNo" value="{{old('idNo')}}">
        @if ($errors->has('idNo'))
            <span  role="alert">
                <strong>{{ $errors->first('idNo') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group col-md-6">
        <label for="idImage">Id Image</label>
        <input name="idImage" type="file" class="form-control" id="idImage" value="{{old('idImage')}}">
        @if ($errors->has('idImage'))
            <span  role="alert">
                <strong>{{ $errors->first('idImage') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group col-md-6">
        <label for="passport">passport</label>
        <input name="passport" type="text" class="form-control" id="passport" value="{{old('passport')}}">
        @if ($errors->has('passport'))
            <span  role="alert">
                <strong>{{ $errors->first('passport') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group col-md-6">
        <label for="passportImage">Passport Image</label>
        <input name="passportImage" type="file" class="form-control" id="passportImage" value="{{old('passportImage')}}">
        @if ($errors->has('passportImage'))
            <span  role="alert">
                <strong>{{ $errors->first('passportImage') }}</strong>
            </span>
        @endif
      </div>

    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</section>


@endsection
