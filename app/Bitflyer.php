<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitflyer extends Model
{
    protected $fillable = [
        'symbol',
        'datetime',
        'bid',
        'ask',
        'last',
        'baseVolume',
    ];

    protected $hidden = [];

}