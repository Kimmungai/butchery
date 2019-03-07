<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Services\UserHandler;
use App\Services\OrderHandler;
use App\Supermarket;

class CheckOutController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      if( session('shoppingCart') == [] ){
        Session::flash('message', "Please Add products to Cart First!");
        return back()->withInput();
      }

      $supermarkets = Supermarket::all();
      return view('checkout.index',compact('supermarkets'));
    }

    /*
    *Function to create new order
    */
    public function new_order(Request $request)
    {
      //data validation
      $validatedData = $request->validate([
        'firstName' => 'required|max:255',
        'lastName' => 'required|max:255',
        'email' => 'required|email',
        'phoneNumber' => 'required|numeric|digits_between:9,12',
        'address' => 'required',
        'collectOn' => 'required|date',
        'collectTime' => 'required',
        'method' => 'required|numeric|digits:1',
        'password' => 'min:6',
        'password_confirm' => 'same:password',
      ]);

      //package user registration data
      $userData = [
        'firstName' => $request->input('firstName'),
        'lastName' => $request->input('lastName'),
        'email' => $request->input('email'),
        'phoneNumber' => UserHandler::cleanupPhone($request->input('phoneNumber')),
        'address' => $request->input('address'),
        'supermarket_id' => session('selectedSupermarket') != null ? session('selectedSupermarket') : 1,
        'password' => $request->input('password') != null ? Hash::make($request->input('password')) : '',
      ];

      //remove password from user data array if user was already registered
      if($request->input('password') == null){ unset($userData['password']); }

      $savedUserData = UserHandler::handleCustomer($userData);
      session(['savedUserData' => $savedUserData]);

      //package order data
      $orderData = [
        'customer_id' =>   $savedUserData->customer->id,
        'collectOn'   =>   $request->input('collectOn'),
        'collectTime' =>   $request->input('collectTime'),
      ];

      //package payment data
      $cartTotal = (float) str_replace(',', '', session('shoppingCartTotal'));
      $paymentData = [
        'method' => $request->input('method'),
        'amountDue' => $cartTotal,
        'amountPayable' => $this->amount_payable($cartTotal,0),
      ];

      //order products
      $orderProducts = session('shoppingCart');


      $savedOrderData = OrderHandler::handleOrder($orderData,$paymentData,$orderProducts);
      session(['savedOrderData' => $savedOrderData]);

      return redirect('/order-payment');
    }

    /*
    *Function to handle payment
    */
    public function order_payment()
    {
      //if the order has not been saved yet return
      if (session('savedUserData') == null || session('savedOrderData') == null ){
        Session::flash('message', "Please Checkout Before you can pay!");
        return back();

      }else{

        $savedUserData = session('savedUserData');
        $savedOrderData = session('savedOrderData');

      }
      return view('checkout.payment',compact('savedUserData','savedOrderData'));
    }

    /*
    *Function to finalize order
    */
    public function thank_you()
    {
      if(session('savedUserData')==null || session('savedOrderData')==null)
      {
        Session::flash('message', "Please Checkout First!");
        return back();
      }
      $savedUserData = session('savedUserData');
      $savedOrderData = session('savedOrderData');

      //empty cart
      session(['shoppingCart' => []]);
      session(['shoppingCartTotal' => '']);
      session()->forget('savedUserData');
      session()->forget('savedOrderData');

      //send packaging order
      //send notification to user

      return view('checkout.thankyou',compact('savedUserData','savedOrderData'));
    }

    private function amount_payable($amountDue,$discountPercent=0)
    {
      $amount_payable_percent = (100 - $discountPercent)/100;
      //for testing purposes pay ksh. 1
      return 1.00;
      return $amount_payable_percent * $amountDue;
    }
}
