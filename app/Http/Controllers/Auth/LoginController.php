<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate($email, $password)
    {
        Auth::attempt(['email' => $email, 'password' => $password]);
    }

    /**
     * Check for login cookie
     *
     */
    public function checkCookie()
    {
        if (isset($_COOKIE['RLogin'])) {
            $cookieValue = json_decode($_COOKIE['RLogin']);
            $email = $cookieValue->email;
            $loginToken = $cookieValue->token;

            if (User::where('email', $email)->exists()) {
                $token = User::where('email', $email)->pluck('login_token');
                $name = User::where('email', $email)->pluck('name');

                if ($token[0] === $loginToken) {
                    return view('login', [
                        'email' => $email,
                        'name' => $name[0]
                    ]);
                }
            }
            return view('login');
        } else {
            return view('login');
        }
    }

    /**
     * Login user
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $helper = new UserHelper();

        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], $helper->messages());

        $exists = User::where('email', $email)->first();

        if (!$exists) {
            return back()->with('error', trans('auth.emailNotExists'));
        } else {
            $approved = User::where('email', $email)->pluck('approved')->toArray();
            if (!(boolean) $approved[0]) {
                return back()->with('error', trans('auth.accountNotConfirmed'));
            }

            $userPassword = User::where('email', $email)->pluck('password')->toArray();
            if (!Hash::check($password, $userPassword[0])) {
                return back()->with('error', trans('auth.wrongPassword'));
            } else {
                session(['email' => $email]);
                $this->authenticate($email, $password);
                $dateTime = Carbon::now("Europe/Rome")->format('Y-m-d H:i');
                $helper->lastSeen($email, $dateTime);
                $helper->createLoginCookie($email);

                return view('auth.main', []);
            }
        }
    }

    /**
     * User logout
     *
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
