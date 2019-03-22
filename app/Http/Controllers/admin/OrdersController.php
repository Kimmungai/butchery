<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Order;
use App\User;
use App\Services\OrderHandler;
use App\Supermarket;
use App\Services\UserHandler;

class OrdersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /*
  *Function to return order registration form
  */
  public function register_order(  )
  {
    //code
  }

  /*
  *Function to get order
  */
  public function get_order( $id )
  {
    //get order
    $order = Order::find( $id );

    //get order customer
    $user = User::find( $order->customer_id );

    //get staff that packaged order
    $packagedBy = User::find( $order->packagedBy );

    //get staff that released order
    $releasedBy = User::find( $order->releasedBy );

    //get order products
    $products = OrderHandler::getOrderProducts( $id );

    return view('admin.order.order',compact('order','user','products','packagedBy','releasedBy'));
  }

  /*
  *Function to get orders
  */
  public function get_orders()
  {
    $userSupermarkets  = UserHandler::UserSupermarket(Auth::id());

    $orders = Order::paginate(env('NUMBER_OF_ITEMS_IN_TABLE',1));
    return view('admin.order.index',compact('orders','userSupermarkets'));
  }

  /*
  *Function to update order
  */
  public function update_order( Request $request )
  {
    $order_id = $request->input('order_id');
    $validatedOrder = $this->validateOrder($request,$order_id);
    $orderTableData = $request->only(['collectOn','collectTime','state']);
    $paymentTableData = $request->only(['method','status','amountDue']);
    OrderHandler::UpdateOrder( $order_id, $orderTableData, $paymentTableData );
    Session::flash('message', "Details saved succesfully!");
    return back();
  }

  /*
  *Function to delete order
  */
  public function delete_order( $id )
  {
    if( $this->excuteDelitionOrRestore( $id ) )
    {
      Session::flash('message', "Order Deleted!");
    }
    else
    {
      Session::flash('error', "Invalid!");
    }

    return redirect('admin');

  }

  /*
  *Function to delete trashed order permanently
  */
  public function remove_order( $id )
  {
    if( $this->excuteDelitionOrRestore( $id, 'permanent' ) )
    {
      Session::flash('message', "Order Deleted Permanently!");
    }
    else
    {
      Session::flash('error', "Invalid!");
    }

    return redirect('admin');
  }

  /*
  *Function to restore trashed order
  */
  public function restore_order( $id )
  {
    if( $this->excuteDelitionOrRestore( $id, 'restore' ) )
    {
      Session::flash('message', "Order Restored!");
    }
    else
    {
      Session::flash('error', "Invalid!");
    }

    return redirect('admin');
  }

  /*
  *Function to get trashed orders
  */
  public function get_trashed_orders()
  {
    $orders = Order::onlyTrashed()->get();

    return view('admin.order.trash', compact('orders'));
  }

  /*
  *Function to get trashed order
  */
  public function get_trashed_order( $id )
  {
    $order = Order::where('id',$id)->withTrashed()->first();

    //get order customer
    $user = User::find( $order->customer_id );

    //get staff that packaged order
    $packagedBy = User::find( $order->packagedBy );

    //get staff that released order
    $releasedBy = User::find( $order->releasedBy );

    //get order products
    $products = OrderHandler::getOrderProducts( $id );

    return view('admin.order.trashed-order', compact('order','user','products','packagedBy','releasedBy'));
  }

  /*
  *Function to validate order
  */
  protected function validateOrder($request,$order_id='')
  {
    $data = [
      'collectOn' => 'required|date',
      'collectTime' => 'required',
      'order_id' => 'required|numeric',
      'method' => 'required|numeric|digits:1',
      'state' => 'required|numeric|digits:1',
      'status' => 'required|numeric|digits:1',
      'amountDue' => 'required|numeric',
    ];

    if( $order_id == '' ){ unset($data['order_id']); }
    $validatedOrder = $request->validate($data);
    return $validatedOrder;
  }

  /*
  *Function to delete or restore order
  */
  protected function excuteDelitionOrRestore( $id, $type='soft' )
  {
    $order = Order::where('id',$id)->withTrashed()->first();

    if( !$order ){ return false; }

    switch ($type)
    {
      case 'soft':
        $order->delete();
        $order->payment()->delete();
        $order->orderProducts()->delete();
        break;

      case 'permanent':
        $order->forceDelete();
        $order->payment()->forceDelete();
        $order->orderProducts()->forceDelete();
        break;

      case 'restore':
        $order->restore();
        $order->payment()->restore();
        $order->orderProducts()->restore();
        break;

      default:
        // code...
        break;
    }
    return true;
  }

}
