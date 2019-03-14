<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
  use SoftDeletes;

  protected $fillable = [
      'name','sku','img1','img2','img3', 'img4', 'img5','createdBy','type','virtualProduct','price','salePrice','regularPrice','description','purchaseNote','excerpt','supermarket_id','category_id','rating'
  ];

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
