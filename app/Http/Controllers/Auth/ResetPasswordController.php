<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Validate token
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function reset(Request $request)
    {
        $helper = new UserHelper();
        $validatedData = $request->validate([
            'token' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ], $helper->messages());

        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', trans('auth.emailNotExists'));
        } else {
            $token = $request->input('token');
            $match = $helper->emailAndTokenMatch($email, $token);
            if ($match) {
                $expired = $helper->checkTokenExpirationTime($token, $email);
                if ($expired) {
                    return back()->with('error', trans('auth.tokenExpired'));
                } else {
                    $password = $request->input('password');
                    $password = Hash::make($password);
                    User::where('email', $email)
                        ->update(['password' => $password]);
                    return redirect('/login')->with('success', trans('auth.passwordChanged'));
                }
            } else {
                return back()->with('error', trans('auth.wrongToken'));
            }
        }
    }
}
