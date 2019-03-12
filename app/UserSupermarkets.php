<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserSupermarkets extends Model
{
  use SoftDeletes;

  protected $fillable = ['user_id','supermarket_id'];


}
