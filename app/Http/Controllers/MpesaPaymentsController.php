<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Events\MpesaResponseEvent;
use App\User;
use App\Order;
use App\Supermarket;
use App\Services\PaymentHandler;

class MpesaPaymentsController extends Controller
{
    /*
    * required vriables
    */
    protected $PartyA = null;
    protected $AccountReference = null;
    protected $TransactionDesc = null;
    protected $Amount = null;
    # Get the timestamp, format YYYYmmddhms -> 20181004151020
    protected $Timestamp = null;
    protected $BusinessShortCode =null;
    protected $Passkey = null;
    protected $access_token_url = null;
    protected $initiate_url = null;
    protected $CallBackURL = null;
    protected $consumerSecret = null;
    protected $consumerKey = null;


    /*
    *Function to process payment via MPESA
    */
    public function mpesa( Request $request )
    {
      //data validation
      $validatedData = $request->validate([
        'userId' => 'required|numeric',
        'orderId' => 'required|numeric',
      ]);

      $user = User::find($request->input('userId'));
      $order = Order::find($request->input('orderId'));
      $supermarket = Supermarket::find($user->supermarket_id);

      //assign variables
      $this->PartyA = $user->phoneNumber;
      $this->AccountReference = substr($supermarket->name,0,10)." Order ".substr($order->id,0,5);
      $this->TransactionDesc = $order->description === '' ? substr($order->description,0,25) : substr(env('DEFAULT_TRANSACTION_DESCRIPTION'),0,25);
      $this->Amount = $order->payment->amountPayable;
      $this->BusinessShortCode = env('BUSINESS_SHORTCODE','174379');
      $this->Timestamp = Carbon::now()->format('Ymdhms');
      $this->Passkey = env('PASS_KEY');
      $this->access_token_url = env('ACCESS_TOKEN_URL');
      $this->initiate_url = env('INTIATE_URL');
      //$this->CallBackURL = url('/mpesa-callback');
      $this->CallBackURL ='https://stale-panda-87.localtunnel.me';
      $this->consumerSecret = env('CONSUMER_SECRET');
      $this->consumerKey = env('CONSUMER_KEY');

      //extract variables
      $transactionData = json_decode($this->request_daraja_API());
      $MerchantRequestID = $transactionData->MerchantRequestID;
      $CheckoutRequestID = $transactionData->CheckoutRequestID;

      if($MerchantRequestID != '')
      {
        $paymentData = [
          'requestId' => $MerchantRequestID,
          'methodCheckoutId' => $CheckoutRequestID
        ];

        $payment=PaymentHandler::paymentTable($order->payment->id,$paymentData);
        return 1;

      }
      else
      {
        return 0;
      }

    }

    /*
    *Function to handle Mpesa callback
    */
    public function mpesa_callback( Request $request )
    {
      $response = $request->all();

      //extract variables
      $MerchantRequestID = $response['Body']['stkCallback']['MerchantRequestID'];
      //$ResultCode = $request->data->Body->stkCallback->ResultCode;

      /*
      *check if payment has succeeded
      */
      /*if($result[0]->resultcode == "0"){
  			echo json_encode(array("rescode" => "0", "resmsg" => "Order completed successfully"));
  		}
      else if($result[0]->resultcode == "1032"){
		    echo json_encode(array("rescode" => "1032", "resmsg" => "You have cancelled the payment request."));
  		}
  		else if($result[0]->resultcode == "1001"){
  			echo json_encode(array("rescode" => "1001", "resmsg" => "A similar transaction is in progress, please wait as we process the transaction."));
  		}
  		else if($result[0]->resultcode == "2001"){
  		  echo json_encode(array("rescode" => "2001", "resmsg" => "Wrong M-PESA pin entered, please click on pay and enter pin again."));
  		}
  		else if($result[0]->resultcode == "1"){
  			echo json_encode(array("rescode" => "1", "resmsg" => "The balance is insufficient for the transaction."));
  		}
  		else if($result[0]->resultcode == "9990"){
  			echo json_encode(array("rescode" => "9990", "resmsg" => "Error encountered during payment processing"));
  		}
      else{
      	echo json_encode(array("rescode" => "9999", "resmsg" => "Payment results not received, please pay first."));
      }*/

      $updatepayment = PaymentHandler::mpesaPaymentReceive($MerchantRequestID);
      //return payment status from mpesa
      $data = [
        'status' => 1,
        'response' => $updatepayment
      ];

      event(new MpesaResponseEvent($data));
      return;
    }

    /*
    *Function to send request to Daraja API
    */
    protected function request_daraja_API()
    {
      # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
      $Password = base64_encode($this->BusinessShortCode.$this->Passkey.$this->Timestamp);
      # header for access token
      $headers = ['Content-Type:application/json; charset=utf8'];

      $curl = curl_init($this->access_token_url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($curl, CURLOPT_HEADER, FALSE);
      curl_setopt($curl, CURLOPT_USERPWD, $this->consumerKey.':'.$this->consumerSecret);
      $result = curl_exec($curl);

      $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

      $result = json_decode($result);

      $access_token = $result->access_token;

      curl_close($curl);
      # header for stk push
      $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
      # initiating the transaction
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $this->initiate_url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header
      $curl_post_data = array(
        //Fill in the request parameters with valid values
        'BusinessShortCode' => $this->BusinessShortCode,
        'Password' => $Password,
        'Timestamp' => $this->Timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $this->Amount,
        'PartyA' => $this->PartyA,
        'PartyB' => $this->BusinessShortCode,
        'PhoneNumber' => $this->PartyA,
        'CallBackURL' => $this->CallBackURL,
        'AccountReference' => $this->AccountReference,
        'TransactionDesc' => $this->TransactionDesc
      );
      $data_string = json_encode($curl_post_data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
      $curl_response = curl_exec($curl);
      return $curl_response;
    }

}
