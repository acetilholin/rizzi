<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Notifications\ResetPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Send reset token
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function send(Request $request)
    {
        $email = $request->input('email');
        $helper = new UserHelper();

        $validatedData = $request->validate([
            'email' => 'required'
        ], $helper->messages());

        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', trans('auth.emailNotExists'));
        } else {
            $approved = User::where('email', $email)->pluck('approved')->toArray();
            $uid = User::where('email', $email)->pluck('id')->toArray();
            if (!$approved[0]) {
                return back()->with('error', trans('auth.accountNotConfirmed'));
            } else {
                $token = Str::random(15);
                $helper->insertResetPasswordToken($token, $email);
                $user->notify(new ResetPassword($token, $uid[0]));
                return redirect('/token')->with('success', trans('auth.tokenSent'));
            }
        }
    }
}
