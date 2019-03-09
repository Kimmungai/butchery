<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supermarket;
use App\Services\UserHandler;

class RegisterUserController extends Controller
{
    /*
    *Function to display all users
    */
    public function index()
    {
      //get user supermarkets
      $user_supemarkets = UserHandler::UserSupermarkets(Auth::id());

      foreach ($user_supemarkets as $user_supemarket)
      {
          $userSupermarkets[]=Supermarket::where('id',$user_supemarket['supermarket_id'])->get();
      }

      return view('admin.index',compact('userSupermarkets'));
    }

    /*
    *Function to display registration form for admin to register users
    */
    public function register_user()
    {
      return view('admin.register-user');
    }
}
