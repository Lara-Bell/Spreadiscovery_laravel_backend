<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zaif extends Model
{
    protected $fillable = [
        'symbol',
        'datetime',
        'high',
        'low',
        'bid',
        'ask',
        'vwap',
        'last',
        'baseVolume',
    ];
    protected $hidden = [];

}
