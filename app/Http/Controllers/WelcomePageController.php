<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Offer;

class WelcomePageController extends Controller
{
    public function index()
    {
        $offers = Offer::where('active', 1)->get();
        $images = Gallery::all();

        $itaView = 'welcome';
        $engView = 'welcome-en';

        $view = url()->current() === env('APP_URL').'/en' ? $engView : $itaView;

        return view($view, [
            'offers' => $offers,
            'images' => $images
        ]);
    }
}
