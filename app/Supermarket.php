<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Supermarket extends Model
{
  use SoftDeletes;

  public function user()
  {
    return $this->hasMany('App\User');
  }
  public function product()
  {
    return $this->hasMany('App\Product');
  }
  public function department()
  {
    return $this->hasMany('App\Department');
  }
  public function formula()
  {
    return $this->hasOne('App\Formula');
  }
}
