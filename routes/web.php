<?php

use Illuminate\Support\Facades\Route;

/* public routes */
Route::get('/register', function () {
    return view('public.register');
});
Route::get('/new-password', function () {
    return view('public.newPassword');
});
Route::get('/token', function () {
    return view('public.token');
});

Route::get('/', ['as' => 'italian', 'uses' => 'WelcomePageController@index']);
Route::get('/en', ['as' => 'english', 'uses' => 'WelcomePageController@index']);
Route::post('/register-user', ['as' => 'registerUser', 'uses' => 'Auth\RegisterController@register']);
Route::post('/login-user', ['as' => 'loginUser', 'uses' => 'Auth\LoginController@login']);
Route::post('/send-token', ['as' => 'sendToken', 'uses' => 'Auth\ForgotPasswordController@send']);
Route::post('/reset-password', ['as' => 'resetPassword', 'uses' => 'Auth\ResetPasswordController@reset']);
Route::post('/send-message', ['as' => 'sendMessage', 'uses' => 'MessageController@message']);
Route::post('/send-inquiry', ['as' => 'sendInquiry', 'uses' => 'MessageController@inquiry']);
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@checkCookie']);

/* middleware */
Route::group(['middleware' =>'authUser'], function ($router) {
    Route::get('main', ['as' => 'main', 'uses' => 'OfferController@index']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::resource('offers', 'OfferController');
    Route::put('/offer-update', ['as' => 'update', 'uses' => 'OfferController@update']);
    Route::get('/remove-offer/{id}', ['as' => 'removeOffer', 'uses' => 'OfferController@destroy']);
    Route::post('image', ['as' => 'image', 'uses' => 'OfferController@image']);
    Route::resource('users', 'UserController');
    Route::get('/remove-user/{id}', ['as' => 'removeUser', 'uses' => 'UserController@destroy']);
    Route::get('/lock-unlock/{id}', ['as' => 'lockUnlock', 'uses' => 'UserController@update']);
    Route::get('/statistics', ['as' => 'statistics', 'uses' => 'StatisticController@index']);
    Route::post('/interval', ['as' => 'interval', 'uses' => 'StatisticController@interval']);
    Route::resource('galleries', 'GalleryController');
    Route::get('/edit-image', ['as' => 'loadCar', 'uses' => 'GalleryController@edit']);
    Route::get('/load-image', ['as' => 'loadImage', 'uses' => 'GalleryController@loadImage']);
    Route::post('/update', ['as' => 'update', 'uses' => 'GalleryController@update']);
});

