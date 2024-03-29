<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\MessageHelper;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Notifications\Message;
use App\Notifications\Inquiry;

class MessageController extends Controller
{
    public function message(Request $request)
    {
        $rules = array(
            'fullname' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
            'message' => 'required|min:10'
        );

        $data = request(['fullname', 'email', 'message']);
        $validator = Validator::make($data, $rules, MessageHelper::messages());

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 401);
        } else {
            $userHelper = new UserHelper();
            $emailSender = $request->input('email');
            $fullname = $request->input('fullname');
            $message = $request->input('message');
            $hotel = env('EMAIL_HOTEL');
            $geoData = $userHelper->geoData();

            $user = User::where('email', $hotel)->first();

            $user->notify(new Message($emailSender, $fullname, $message, $geoData['country'], $geoData['city']));

            $response = url()->current() === env('APP_URL').'/en' ? trans('messages.sent') : trans('messages.sentIT');

            return [
                'resp' => $response,
                'loading' => false
            ];
        }
    }

    public function inquiry(Request $request)
    {
        $salutation = $request->salutation;
        $fullname = $request->fullname;
        $emailSender = $request->email;
        $adults = $request->adults;
        $kids = $request->kids;
        $board = $request->board ?: '/';
        $arrival = $request->arrival;
        $departure = $request->departure;

        if (url()->current() === env('APP_URL').'/en') {
            $response = trans('messages.sent');
            $salutation = trans('messages.'.$salutation.'-en');
        } else {
            $response = trans('messages.sentIT');
            $salutation = trans('messages.'.$salutation.'-it');
        }

        $arrival = date("d.m.Y", strtotime($arrival));
        $departure = date("d.m.Y", strtotime($departure));

        $hotel = env('EMAIL_HOTEL');
        $user = User::where('email', $hotel)->first();

        $user->notify(new Inquiry($salutation, $fullname, $emailSender, $adults, $kids, $board, $arrival, $departure));

        return [
            'resp' => $response,
            'loading' => false
        ];
    }
}
