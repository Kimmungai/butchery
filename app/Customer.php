<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model
{
  use SoftDeletes;
  
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
