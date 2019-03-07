<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supermarket extends Model
{
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
}
