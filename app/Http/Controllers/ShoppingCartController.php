<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ShoppingCartController extends Controller
{

  /*
  *Function to add an item to session array holding cart items
  */
  public function add_to_cart( Request $request )
  {
    $product_id = $request->input('id');
    $orderedQuantity = $request->input('quantity') != '' ? $request->input('quantity') : 1;
    if( !filter_var($orderedQuantity, FILTER_VALIDATE_INT) ){return 0;}//validate quantity
    //get product

    $product = Product::where('id',$product_id)->first();

    if($this->available_quantity($product_id) < $orderedQuantity){

      return -1; //out of stock

    }

      $cart = count(session('shoppingCart')) ? session('shoppingCart') : [];
      if( $this->in_cart($product_id,$cart) ){//check if already in cart

        return $this->edit_cart($product_id,$orderedQuantity);

      }else {
        $newItemPrice = $product->price * $orderedQuantity;
        $newItem = ['item'=>$product->name,'product_id' => $product_id, 'quantity' => $orderedQuantity,'image'=>$product->img1,'price'=>$product->price,'total'=>$newItemPrice];
        array_push($cart, $newItem);

        session(['shoppingCart' => $cart]);
        session(['shoppingCartTotal' => number_format($this->get_cart_total($cart))]);

    }

    return session('shoppingCart'); //return the session array
  }

  /*
  *Function to remove item from session array that holds cart items
  */

  public function remove_from_cart( Request $request )
  {
    $product_id = $request->input('id');
    //check if a cart array contains the item, if it exists remove it
    $cart =  count(session('shoppingCart')) ? session('shoppingCart') : [];

    $newCart = [];
    foreach ($cart as $item) {

      if($item['product_id'] == $product_id){continue;}
      array_push($newCart, $item);
    }

    session(['shoppingCart' => $newCart]);
    session(['shoppingCartTotal' => number_format($this->get_cart_total($newCart))]);
    return session('shoppingCart'); //return the session array
  }

  /*
  *Function to reset shopping cart session array
  */

  public function empty_cart()
  {
    //check if a cart array contains the item, if it exists remove it
    session(['shoppingCart' => []]);
    session(['shoppingCartTotal' => number_format($this->get_cart_total([]))]);
    return session('shoppingCart'); //return the session array
  }

  /*
  *Function to edit item in cart
  */

  protected function edit_cart($product_id,$newQuantity)
  {
    $cart =  count(session('shoppingCart')) ? session('shoppingCart') : [];

    $count = 0;
    foreach ($cart as $item) {

      if($item['product_id'] == $product_id){
        $cart[$count]['quantity'] =  $newQuantity;
        $cart[$count]['total'] = $cart[$count]['price'] * $newQuantity;
      }

      $count++;
    }

    session(['shoppingCart' => $cart]);
    session(['shoppingCartTotal' => $this->get_cart_total($cart)]);
    return session('shoppingCart'); //return the session array
  }

  /*
  *Function to get quantity of a particular item
  */
  protected function available_quantity($product_id)
  {
    $product = Product::where('id',$product_id)->first();
    //get inventory quantity
    $availableQuantity = $product->inventory->quantity;
    return $availableQuantity;
  }

  /*
  *Function to check if an item exists in an cart
  */
  protected function in_cart($product_id,$cart)
  {
    foreach ($cart as $item)
    {
      if($item['product_id'] == $product_id){
        return true;
      }
    }
    return false;
  }

  /*
  *Function to get the total price of items in cart
  */
  protected function get_cart_total($cart)
  {
    $sum = 0;
    foreach( $cart as $item ){
      $sum += $item['total'];
    }
    return $sum;
  }

}
