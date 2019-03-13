<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Inventory extends Model
{
  use SoftDeletes;
  protected $fillable = ['product_id','quantity','state'];
  

  public function product()
  {
    return $this->belongsTo('App\Product');
  }
}
