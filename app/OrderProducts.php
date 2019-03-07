<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['order_id','product_id','quantity'];

  public function order()
  {
    return $this->belongsTo('App\Order');
  }
}
