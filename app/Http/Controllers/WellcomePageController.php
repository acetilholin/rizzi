<?php

namespace App\Http\Controllers;

use App\Http\Resources\OfferCollection;
use App\Offer;

class WellcomePageController extends Controller
{
    public function index()
    {
        $offers = Offer::where('active',1)->get();

        return view('welcome', [
            'offers' => $offers
        ]);
    }
}
