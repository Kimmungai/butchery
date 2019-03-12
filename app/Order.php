<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
  use SoftDeletes;
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['customer_id','state','description','type','packagedBy', 'collectAt', 'collectOn','collectTime','releasedBy'];

  public function customer()
  {
    return $this->belongsTo('App\Customer');
  }
  public function OrderProducts()
  {
    return $this->hasMany('App\OrderProducts');
  }
  public function payment()
  {
    return $this->hasOne('App\Payment');
  }
}
