<?php

namespace App\Http\Controllers;

use App\Helpers\OfferHelper;
use App\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $offers = Offer::all();
        return view('auth.main', [
            'offers' => $offers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $date_from = $request->from;
        $date_to = $request->to;
        $subtitle = $request->subtitle;
        $priceMP = $request->price_mp;
        $pricePC = $request->price_pc;
        $active = (int) $request->active;
        $titleEN = empty($request->titleEN) ? null : $request->titleEN;
        $subtitleEN = empty($request->subtitleEN) ? null : $request->subtitleEN;

        $date_from = Carbon::parse($date_from)->format('Y-m-d');
        $date_to = Carbon::parse($date_to)->format('Y-m-d');

        Offer::create([
            'title' => $title,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'active' => $active,
            'subtitle' => $subtitle,
            'price_mp' => $priceMP,
            'price_pc' => $pricePC,
            'title_en' => $titleEN,
            'subtitle_en' => $subtitleEN
        ]);

        return view('auth.main', [
            'offers' => Offer::all(),
            'info' => trans('offers.created')
        ]);
    }

    /**
     * Change offer's image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function image(Request $request)
    {
        $rules = array(
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2097152'
        );

        $photo = request(['photo']);
        $validator = Validator::make($photo, $rules, OfferHelper::messages());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $file = $request->file('photo');
        $imageName = "cover.jpg";

        Image::make($file)->resize(1920, 1280)->save("./img/custom-fixed/{$imageName}");
        $message = trans('offers.imageChanged');

        return view('auth.main', [
            'offers' => Offer::all(),
            'info' => $message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Offer $offer)
    {
        return response()->json([
            'offer' => $offer
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\View\View
     */
    public function update(Request $request, Offer $offer)
    {
        $id = $request->id;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $active = $request->active;
        $title = $request->title;
        $subtitle = $request->subtitle;
        $priceMP = $request->price_mp;
        $pricePC = $request->price_pc;
        $titleEN = empty($request->titleEN) ? null : $request->titleEN;
        $subtitleEN = empty($request->subtitleEN) ? null : $request->subtitleEN;


        OfferHelper::update($id, $date_from, $date_to, $active, $title, $subtitle, $priceMP, $pricePC, $titleEN,
            $subtitleEN);

        return view('auth.main', [
            'offers' => Offer::all(),
            'info' => trans('offers.offerIsUpdated')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\View\View
     */
    public function destroy(Offer $offer, $id)
    {
        $offer = Offer::find($id);
        $offer->delete();

        return view('auth.main', [
            'offers' => Offer::all(),
            'info' => trans('offers.deleted')
        ]);
    }
}
