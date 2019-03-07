<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'firstName','lastName','middleName','phoneNumber','name', 'email', 'password','address','avatar','idNo','idImage','passport','passportImage','gender','DOB','supermarket_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin()
    {
      return $this->hasOne('App\Admin');
    }
    public function customer()
    {
      return $this->hasOne('App\Customer');
    }
    public function staff()
    {
      return $this->hasOne('App\Staff');
    }
    public function supermarket()
    {
      return $this->belongsToMany('App\Supermarket');
    }
    public function feedback()
    {
      return $this->hasMany('App\Feedback');
    }
}
