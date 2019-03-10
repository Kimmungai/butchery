<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supermarket;
use App\Department;

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
}
