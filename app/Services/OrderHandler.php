<?php

namespace App\Services;
use App\Order;
use App\OrderProducts;
use App\Product;
use App\User;
use Carbon\Carbon;

class OrderHandler
{

  /*
  *Function to handle order record from checkout form
  */
  public static function handleOrder($orderData, $paymentData, $orderProducts)
  {
    return self::newOrder($orderData, $paymentData,$orderProducts);
  }

  /*
  *Function to create new order
  */
  public static function newOrder($orderData, $paymentData=[],$orderProducts=[])
  {
    $order = Order::create($orderData);
    $order->payment()->create($paymentData);
    foreach ($orderProducts as $orderProduct) {
      $order->orderProducts()->create($orderProduct);
    }

    $order = Order::with(['payment'])->find($order->id);
    return $order;

  }

  /*
  *Function to get order products
  */
  public static function getOrderProducts( $id )
  {
    $orderProducts = OrderProducts::where('order_id', $id)->get();
    $products = [];

    foreach ($orderProducts as $orderProduct) {

      $products [] = Product::where('id',$orderProduct->product_id)->first();

    }

    return $products;

  }

  /*
  *Function to update order
  */
  public static function UpdateOrder( $order_id, $orderTableData, $paymentTableData )
  {
    $order = Order::find($order_id);
    $order->update($orderTableData);
    $order->payment->update($paymentTableData);
    return $order;
  }

  /*
  *Function to return orders for a certain day in a given supermarket
  */
  public static function todayOrders( $supermarket_id )
  {
    $count = 0;
    $orders = Order::whereDate('created_at', Carbon::today())->get();
    foreach ( $orders as $order ) {
      if( $order->state == 5 && $order->customer->user->supermarket_id == $supermarket_id )
      {
        $count++;
      }

    }
    return $count;
  }

  /*
  *Function to return orders for a certain day in a given supermarket
  */
  public static function monthOrders( $supermarket_id )
  {
    $dt = Carbon::now();
    $toDate = Carbon::now();
    $fromDate = $dt->subDays(30);
    $count = 0;
    $orders = Order::whereDate( 'created_at','>=',$fromDate)->whereDate( 'created_at','<=',$toDate)->get();
    foreach ( $orders as $order ) {
      if( $order->state == 5 && $order->customer->user->supermarket_id == $supermarket_id )
      {
        $count++;
      }

    }
    return $count;
  }

  /*
  *Function to return daily earnings
  */
  public static function todayEarnings( $supermarket_id )
  {
    $orders = Order::where('state',5)->whereDate('created_at', Carbon::today())->get();
    $totalAmount = 0;
    foreach ($orders as $order) {
      if( $order->payment )
      {
        $totalAmount += $order->payment->amountReceived;
      }
    }

    return $totalAmount;
  }

}
