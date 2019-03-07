<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id',
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function order()
  {
    return $this->hasMany('App\Order');
  }
}
