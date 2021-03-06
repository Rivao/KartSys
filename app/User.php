<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'user_name', 'first_name','last_name', 'email','group_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment', 'employee_id');
    }

    //Lienes rakstītais
    public function reservation()
    {
        return $this->hasMany('App\Reservation', 'employee_id');
    }
}
