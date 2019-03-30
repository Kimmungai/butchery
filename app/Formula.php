<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formula extends Model
{
  use SoftDeletes;
  protected $fillable = ['supermarket_id','type','breast','wings','legs'];
  public function supermarket()
  {
    return $this->belongsTo('App\Supermarket');
  }
}
