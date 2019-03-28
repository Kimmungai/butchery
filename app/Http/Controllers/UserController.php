<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Supermarket;
use App\User;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /*
  *Function to return user profile
  */
  public function profile()
  {
    $currentSupermarket = Supermarket::where('id',session('selectedSupermarket'))->get();
    $allSupermarkets = Supermarket::get();
    $user = User::find(Auth::id());
    return view('user-profile',compact('currentSupermarket','allSupermarkets','user'));
  }
}
