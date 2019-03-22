<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supermarket;
use App\Department;
use App\Services\UserHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SupermarketsController extends Controller
{
  /*
  *Function to return departments of a supermarket
  */
  public function get_departments($id)
  {
    $departments = Department::where('supermarket_id',$id)->get();
    return $departments ;
  }
  /*
  *Function to set selected supermarket
  */
  public function set_supermarket( $id )
  {
      session(['selectedSupermarket' => $id]);
      $currentSupermarket = Supermarket::where('id',$id)->get();
      $allSupermarkets =  UserHandler::UserSupermarket(Auth::id());
      Session::flash('message', "Supermarket ".$currentSupermarket[0]->name." selected");
      return back()->with(['currentSupermarket','allSupermarkets']);
  }
}
