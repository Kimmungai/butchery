<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
  protected $fillable = [
      'user_id','jobId','departmentId','type','availability'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
