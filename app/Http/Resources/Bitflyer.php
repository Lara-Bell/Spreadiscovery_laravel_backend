<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Bitflyer extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        Resource::wrap('Bitflyer');

        return [
            'symbol' => $this->symbol,
            'datetime' => $this->datetime,
            'bid' => $this->bid,
            'ask' => $this->ask,
            'last' => $this->last,
            'baseVolume' => $this->baseVolume,
        ];
    }
}
