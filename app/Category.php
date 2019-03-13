<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use SoftDeletes;

  protected $fillable = ['name','img','description','department_id'];

  public function supermarket()
  {
    return $this->belongsTo('App\Department');
  }
}
