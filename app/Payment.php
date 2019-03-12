<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Payment extends Model
{
  use SoftDeletes;
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['order_id','amountDue','amountReceived','discountPercentage','amountPayable', 'method', 'methodTransactionId','receiptNo'];

  public function order()
  {
    return $this->belongsTo('App\Order');
  }
}
