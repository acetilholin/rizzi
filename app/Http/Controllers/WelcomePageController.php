<?php

namespace App\Http\Controllers;

use App\Http\Resources\OfferCollection;
use App\Offer;

class WelcomePageController extends Controller
{
    public function index()
    {
        $offers = Offer::where('active', 1)->get();

        $itaView = 'welcome';
        $engView = 'welcome-en';

        $view = url()->current() === env('APP_URL').'/en' ? $engView : $itaView;

        return view($view, [
            'offers' => $offers
        ]);
    }
}
