<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Notifications\NewUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Notifications\NewRegistration;

class RegisterController extends Controller
{
    /**
     * Register user
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users|max:60',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'

        ], UserHelper::messages());

        $validatedData['password'] = Hash::make($validatedData['password']);
        unset($validatedData['password_confirmation']);
        $validatedData['last_seen'] = Carbon::now("Europe/Rome")->format('Y-m-d H:i');
        $user = User::create($validatedData);
        $email = $request->input('email');
        $userHelper = new UserHelper();

        $geoData = $userHelper->geoData();

        $user->notify(new NewUser($email));

        $user = User::where('email', env('EMAIL_ADMIN'))->first();
        $user->notify(new NewRegistration($email, $geoData['country'], $geoData['city']));
        return redirect('/login')->with('success', trans('auth.registrationSuccessful'));
    }
}
