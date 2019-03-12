<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserSupermarkets;
use App\Supermarket;

class UsersController extends Controller
{

  /*
  *Function to return a user object
  */
  public function get_user($id)
  {
    $user = User::find($id);
    return view('admin.user',compact('user'));
  }

  /*
  *Function to return a cutomer object
  */
  public function get_customer($id)
  {
    $user = User::find($id);
    if( !$user->customer )
    {
      Session::flash('error', "No record found!");

      return redirect('/admin');
    }
    //get user supermarkets
    $userSupermarkets = $this->get_user_supermarkets($user->id);

    return view('admin.user',compact('user','userSupermarkets'));
  }

  /*
  *Function to return an admin object
  */
  public function get_admin($id)
  {
    $user = User::find($id);
    if( !$user->admin )
    {
      Session::flash('error', "No record found!");

      return redirect('/admin');
    }
    //get user supermarkets
    $userSupermarkets = $this->get_user_supermarkets($user->id);

    return view('admin.user',compact('user','userSupermarkets'));
  }

  /*
  *Function to return a staff object
  */
  public function get_staff($id)
  {
    $user = User::find($id);
    if( !$user->staff )
    {
      Session::flash('error', "No record found!");

      return redirect('/admin');
    }
    //get user supermarkets
    $userSupermarkets = $this->get_user_supermarkets($user->id);

    return view('admin.user',compact('user','userSupermarkets'));
  }


  /*
  *Function to return user supermarkets array
  */
  private function get_user_supermarkets($user_id)
  {
    $userSupermarkets = [];
    $supermarketIds = UserSupermarkets::where('user_id',$user_id)->get('supermarket_id');

    foreach ($supermarketIds as $id)
    {
      $userSupermarkets [] = Supermarket::find($id);
    }

    return $userSupermarkets;

  }

  /*
  *Function to soft delete user
  */
  public function soft_delete_user($id)
  {
    if($user = User::find($id))
    {
      $this->excuteDelition($user);
      Session::flash('message', "User deleted!");
    }
    else
    {
      Session::flash('error', "invalid!");
    }
    return redirect('/admin');

  }

  /*
  *Function to delete user permanently
  */
  public function remove_user($id)
  {
    return "mada desu";
  }



  /*
  *Function to excute deletion
  */
  protected function excuteDelition($user,$delition='soft')
  {
    if( $delition==='soft' )
    {
      if($user->customer){

         if($user->customer->order){

             foreach ($user->customer->order as $order) {
               if($order->payment){
                 $order->payment->delete();
               }
               if($order->OrderProducts){
                 foreach ($order->OrderProducts as $orderProduct) {
                   $orderProduct->delete();
                 }
               }
               $order->delete();
             }

         }
         $user->customer->delete();
       }

      if($user->staff){ $user->staff->delete(); }
      if($user->admin){ $user->admin->delete(); }
      $user->delete();
    }else{

      if($user->customer){

         if($user->customer->order){

             foreach ($user->customer->order as $order) {
               if($order->payment){
                 $order->payment->forceDelete();
               }
               if($order->OrderProducts){
                 foreach ($order->OrderProducts as $orderProduct) {
                   $orderProduct->forceDelete();
                 }
               }
               $order->forceDelete();
             }

         }
         $user->customer->forceDelete();
       }

      if($user->staff){ $user->staff->forceDelete(); }
      if($user->admin){ $user->admin->forceDelete(); }
      $user->forceDelete();

    }
  }

}
