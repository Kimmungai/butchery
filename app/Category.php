<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use SoftDeletes;

  protected $fillable = ['name','img','description','department_id','featured'];

  public function supermarket()
  {
    return $this->belongsTo('App\Department');
  }
}
