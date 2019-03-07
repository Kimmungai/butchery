<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function supermarket()
  {
    return $this->belongsTo('App\Supermarket');
  }
  public function inventory()
  {
    return $this->hasOne('App\Inventory');
  }
  public function variation()
  {
    return $this->hasOne('App\Variation');
  }
  public function ProductCategories()
  {
    return $this->hasMany('App\ProductCategories');
  }
}
