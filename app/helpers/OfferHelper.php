<?php


namespace App\helpers;


use App\Offer;
use Carbon\Carbon;

class OfferHelper
{
    static function update($id, $date_from, $date_to, $active, $title, $subtitle, $priceMP, $pricePC)
    {
        Offer::where('id', $id)
            ->update([
                'date_from' => Carbon::parse($date_from)->format('Y-m-d'),
                'date_to' => Carbon::parse($date_to)->format('Y-m-d'),
                'active' => $active,
                'title' => $title,
                'subtitle' => $subtitle,
                'price_mp' => $priceMP,
                'price_pc' => $pricePC
            ]);
    }

    static function messages()
    {
        return [
            'date_from.required' => trans('offer.dateFromRequired'),
            'date_to.required' => trans('offer.dateToRequired'),
            'title.required' => trans('offer.titleRequired'),
            'title.min' => trans('offer.titleMin'),
            'subtitle.required' => trans('offer.subtitleRequired'),
            'subtitle.min' => trans('offer.subtitleMin'),
            'photo.required' => trans('photo.required'),
            'photo.image' => trans('photo.image'),
            'photo.mimes' => trans('photo.mimes'),
            'photo.max' => trans('photo.max')
        ];
    }
}
