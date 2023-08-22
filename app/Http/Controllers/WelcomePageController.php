<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Offer;
use Illuminate\Support\Facades\URL;

class WelcomePageController extends Controller
{
    public function index()
    {
        $offers = Offer::where('active', 1)->get();
        $images = Gallery::all();

        $itaView = 'welcome';
        $engView = 'welcome-en';

        $view = URL::current() === env('APP_URL').'/en' ? $engView : $itaView;
        $route = URL::current() === env('APP_URL') || URL::current() === env('APP_URL_S') ? 'english' : 'italian';

        return view($view, [
            'offers' => $offers,
            'images' => $images,
            'langRoute' => $route,
            'lang' => $view === 'welcome' ? 'ENG' : 'ITA'
        ]);
    }

    public function test()
    {
        $offers = Offer::where('active', 1)->get();
        $images = Gallery::all();

        return view('test', [
            'offers' => $offers,
            'images' => $images
        ]);
    }
}
