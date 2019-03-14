<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Department extends Model
{
  use SoftDeletes;
  protected $fillable = [
      'supermarket_id','type','name'
  ];

  public function supermarket()
  {
    return $this->belongsTo('App\Supermarket');
  }
  public function category()
  {
    return $this->hasMany('App\Category');
  }
}
