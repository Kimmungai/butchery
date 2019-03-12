<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id','jobId','departmentId'
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
