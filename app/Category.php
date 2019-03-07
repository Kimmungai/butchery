<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function supermarket()
  {
    return $this->belongsTo('App\Department');
  }
}
