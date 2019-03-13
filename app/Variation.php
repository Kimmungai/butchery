<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Variation extends Model
{
  use SoftDeletes;

  protected $fillable = ['product_id','units_of_measure','measurement_system','height','width','color','size','weight'];


  public function order()
  {
    return $this->belongsTo('App\Order');
  }
}
