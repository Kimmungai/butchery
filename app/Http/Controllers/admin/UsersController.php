<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
  /*
  *Function to return a user object
  */
  public function get_user($id)
  {
    $user = User::find($id);
    if( $user->customer )
    {
      $userType = 'customer';
    }
    else if ( $user->staff )
    {
      $userType = 'staff';
    }
    else
    {
      $userType = 'admin';
    }
    return view('admin.user',compact('user','userType'));
  }
}
