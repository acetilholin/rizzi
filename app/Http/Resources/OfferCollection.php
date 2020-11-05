<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OfferCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'date_from' => date("d.m.Y", strtotime($this->date_from)),
            'date_to' => date("d.m.Y", strtotime($this->date_to)),
            'price_mp' => number_format($this->price_mp,2,',','.'),
            'price_pc' => number_format($this->price_pc,2,',','.'),
            'subtitle' => $this->subtitle
        ];
    }
}
