<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Customer;
use App\Staff;
use App\Admin;
use App\Order;
use App\OrderProducts;
use App\Payment;
use App\UserSupermarkets;
use App\Supermarket;

class UsersController extends Controller
{

  /*
  *Function to return a user object
  */
  public function get_trashed_user($id)
  {
    $user = User::where('id',$id)->withTrashed()->first();
    return view('admin.trashed-users',compact('user'));
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
    if($user = User::withTrashed()->where('id',$id)->first())
    {
      $this->excuteDelition($user,'permanently');
      Session::flash('message', "User deleted!");
    }
    else
    {
      Session::flash('error', "invalid!");
    }
    return redirect('/trashed-users');
  }

  /*
  *Function to get trashed users
  */
  public function get_trashed_users()
  {
    $trashedUsers = User::onlyTrashed()->get();
    return view('admin.users-trash',compact('trashedUsers'));
  }

  public function restore_user($id)
  {
    $user = User::where('id',$id)->withTrashed()->first();
    $this->excuteRestoration($user);
    Session::flash('message', "User Restored!");
    return redirect('/trashed-users');
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

      $userSupermarkets = UserSupermarkets::where('user_id',$user->id)->get();

      foreach ($userSupermarkets as $userSupermarket) {
        $userSupermarket->delete();
      }

      $user->delete();
    }else{
      $customer = Customer::where('user_id',$user->id)->withTrashed()->first();
      $staff = Staff::where('user_id',$user->id)->withTrashed()->first();
      $admin = Admin::where('user_id',$user->id)->withTrashed()->first();
      if($customer){
        $orders = Order::where('customer_id',$customer->id)->withTrashed()->get();
         if($orders){

             foreach ($orders as $order) {

               $payment = Payment::where('order_id',$order->id)->withTrashed()->first();

               $orderProducts = OrderProducts::where('order_id',$order->id)->withTrashed()->get();

               if($payment){
                 $payment->forceDelete();
               }
               if($orderProducts){
                 foreach ($orderProducts as $orderProduct) {
                   $orderProduct->forceDelete();
                 }
               }
               $order->forceDelete();
             }

         }
         $customer->forceDelete();
       }

      if($staff){ $staff->forceDelete(); }
      if($admin){ $admin->forceDelete(); }

      $userSupermarkets = UserSupermarkets::where('user_id',$user->id)->withTrashed()->get();

      foreach ($userSupermarkets as $userSupermarket) {
        $userSupermarket->forceDelete();
      }
      $user->forceDelete();
    }
  }

  /*
  *Function to excute user restoration
  */
  protected function excuteRestoration($user)
  {
    $customer = Customer::where('user_id',$user->id)->withTrashed()->first();
    $staff = Staff::where('user_id',$user->id)->withTrashed()->first();
    $admin = Admin::where('user_id',$user->id)->withTrashed()->first();
    if($customer){
      $orders = Order::where('customer_id',$customer->id)->withTrashed()->get();
       if($orders){

           foreach ($orders as $order) {

             $payment = Payment::where('order_id',$order->id)->withTrashed()->first();

             $orderProducts = OrderProducts::where('order_id',$order->id)->withTrashed()->get();

             if($payment){
               $payment->restore();
             }
             if($orderProducts){
               foreach ($orderProducts as $orderProduct) {
                 $orderProduct->restore();
               }
             }
             $order->restore();
           }

       }
       $customer->restore();
     }

    if($staff){ $staff->restore(); }
    if($admin){ $admin->restore(); }

    $userSupermarkets = UserSupermarkets::where('user_id',$user->id)->withTrashed()->get();

    foreach ($userSupermarkets as $userSupermarket) {
      $userSupermarket->restore();
    }
    $user->restore();
  }

}
