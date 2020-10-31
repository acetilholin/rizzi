<?php

use Illuminate\Support\Facades\Route;

/* public routes */
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('public.login');
});
Route::get('/register', function () {
    return view('public.register');
});
Route::get('/new-password', function () {
    return view('public.newPassword');
});
Route::get('/token', function () {
    return view('public.token');
});

Route::post('/register-user', ['as' => 'registerUser', 'uses' => 'Auth\RegisterController@register']);
Route::post('/login-user', ['as' => 'loginUser', 'uses' => 'Auth\LoginController@login']);
Route::post('/send-token', ['as' => 'sendToken', 'uses' => 'Auth\ForgotPasswordController@send']);
Route::post('/reset-password', ['as' => 'resetPassword', 'uses' => 'Auth\ResetPasswordController@reset']);
Route::post('/send-message', ['as' => 'sendMessage', 'uses' => 'MessageController@message']);
Route::post('/send-inquiry', ['as' => 'sendInquiry', 'uses' => 'MessageController@inquiry']);

/* middleware */
Route::get('main', ['as' => 'main', 'uses' => 'OfferController@index']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::resource('offers', 'OfferController');
Route::put('/offer-update', ['as' => 'update', 'uses' => 'OfferController@update']);

Route::resource('users', 'UserController');
