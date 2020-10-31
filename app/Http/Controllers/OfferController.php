<?php

namespace App\Http\Controllers;

use App\helpers\OfferHelper;
use App\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        $validatedData = $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
            'active' => 'required',
            'title' => 'required|min:3',
            'subtitle' => 'required|min:3'
        ], OfferHelper::messages());

        $validatedData['date_from'] = Carbon::parse($date_from)->format('Y-m-d');
        $validatedData['date_to'] = Carbon::parse($date_to)->format('Y-m-d');

        Offer::create($validatedData);

        return view('auth.main', [
            'offers' => Offer::all(),
            'info' => trans('offers.created')
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

        OfferHelper::update($id, $date_from, $date_to, $active, $title, $subtitle);

        return view('auth.main', [
            'offers' => Offer::all(),
            'info' => trans('offers.offerIsUpdated')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
