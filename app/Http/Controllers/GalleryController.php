<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $images = Gallery::all();
        return view('auth.gallery', [
            'images' => $images
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
     * Loads image
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadImage(Request $request)
    {
        $id = $request->id;
        $image = Gallery::where('id', $id)->pluck('path')->toArray();
        return response()->json([
            'image' => $image[0]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $image = Gallery::find($id);
        return response()->json([
            'image' => $image
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\View\View
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $category = $request->category;
        $captionIT = $request->caption_it;
        $captionEN = $request->caption_en;

        $image = Gallery::where('id', $id)->pluck('path')->toArray();

        if ($request->file('file') === null) {
            $imgPath = $image[0];
        } else {
            $imageName = Str::random(10).".jpg";
            $imgPath = "img/gallery/{$imageName}";
            $file = $request->file('file');
            Image::make($file)->resize(1328, 882)->save("img/gallery/{$imageName}");
        }

        Gallery::where('id', $id)
            ->update([
                'path' => $imgPath,
                'category' => $category,
                'caption_it' => $captionIT,
                'caption_en' => $captionEN
            ]);

        return view('auth.gallery', [
            'images' => Gallery::all(),
            'info' => trans('image.imageUpdated')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
