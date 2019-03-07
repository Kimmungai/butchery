<?php

namespace App\Services;
use App\Payment;

class PaymentHandler
{

  /*
  *Function to update payment table
  */
  public static function paymentTable($paymentId, $paymentData=[])
  {
    Payment::where('id',$paymentId)->update($paymentData);
    $payment = Payment::find($paymentId);
    return $payment;

  }

  /*
  *Function to update payment received from mpesa
  */
  public static function mpesaPaymentReceive($MerchantRequestID)
  {
    $payment = Payment::where('requestId',$MerchantRequestID)->first();

    Payment::where('requestId',$MerchantRequestID)->update([
      'status'            => 1,
      'amountReceived'    => $payment->amountPayable
    ]);

    return $payment;

  }

}
