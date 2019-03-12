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
      @component( 'components.customer-edit-form', ["userSupermarkets" => $userSupermarkets] )

      @endcomponent
    </div>
    <!--customer data ends here-->

    <!--staff data starts here-->
    <div @if( session('userBeingRegistered') != 'staff' ) class="d-none" @endif id="staff-data-form">
      @component( 'components.staff-edit-form', ["userSupermarkets" => $userSupermarkets] )

      @endcomponent
    </div>
    <!--staff data ends here-->

    <!--Admin data starts here-->
    <div @if( session('userBeingRegistered') != 'admin' ) class="d-none" @endif id="admin-data-form">
      @component( 'components.admin-edit-form', ["userSupermarkets" => $userSupermarkets] )

      @endcomponent
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

      @component( 'components.user-edit-form', ["userSupermarkets" => $userSupermarkets ] )

      @endcomponent

    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</section>


@endsection
