<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'number', 'date', 'hours', 'minutes', 'length', 'numberRiders',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }


}
