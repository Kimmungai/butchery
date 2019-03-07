<?php

namespace App\Services;
use App\Order;

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
}
