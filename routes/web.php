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

/* middleware */
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
