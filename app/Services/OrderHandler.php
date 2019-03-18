<?php

namespace App\Services;
use App\Order;
use App\OrderProducts;
use App\Product;

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

}
