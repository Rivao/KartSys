<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function kart()
    {
    	return $this->belongsTo('App\Kart');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
