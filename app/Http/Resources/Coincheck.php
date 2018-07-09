<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Coincheck extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        Resource::wrap('Coincheck');
        // return parent::toArray($request);
        return [
            'symbol' => $this->symbol,
            'datetime' => $this->datetime,
            'high' => $this->high,
            'low' => $this->low,
            'bid' => $this->bid,
            'ask' => $this->ask,
            'last' => $this->last,
            'baseVolume' => $this->baseVolume,
        ];
    }
}
