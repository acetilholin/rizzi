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

Route::post('/register-user', ['as' => 'registerUser', 'uses' => 'Auth\RegisterController@register']);
