<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kart_nr', 'model','usable', 'on_track','broken', 'comment',
    ];

    protected $dates = ['deleted_at'];

    public function comment()
    {
    	return $this->hasMany('App\Comment');
    }
}
