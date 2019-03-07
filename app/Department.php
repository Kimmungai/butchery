<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  public function supermarket()
  {
    return $this->belongsTo('App\Supermarket');
  }
  public function category()
  {
    return $this->hasMany('App\Category');
  }
}
