<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coincheck extends Model
{
    protected $fillable = [
        'symbol',
        'datetime',
        'high',
        'low',
        'bid',
        'ask',
        'last',
        'baseVolume',
    ];
    protected $hidden = [];

}
