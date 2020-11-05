<?php


namespace App\helpers;


use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserHelper
{
    public function createLoginCookie($email)
    {
        $cookieName = 'RLogin';
        $token = Hash::make(Str::random(10));
        $data = [
            'email' => $email,
            'token' => $token
        ];

        $user = User::where('email', $email)
            ->update(['login_token' => $token]);

        setcookie($cookieName, json_encode($data), time() + 86400 * 365);
    }

    public function insertResetPasswordToken($token, $email)
    {
        $timeNow = date('Y-m-d H:i');
        User::where('email', $email)->update([
            'reset_token' => $token,
            'token_time' => $timeNow
        ]);
    }

    public static function allUserIds()
    {
        $ids = [];
        $users = User::where('silent', 0)->get();

        foreach ($users as $user) {
            $userData = $user->getAttributes();
            $ids[] = $userData['id'];
        }
        return $ids;
    }

    public static function onlineUsers()
    {
        $userStatus = [];
        $allUserIds = self::allUserIds();
        for ($i = 0; $i < sizeof($allUserIds); $i++) {
            $userStatus[$i] = Cache::has('user-is-online-'.$allUserIds[$i]) ? 'online' : 'offline';
        }
        return $userStatus;
    }

    public function emailAndTokenMatch($email, $token)
    {
        $match = User::where('email', $email)
            ->where('reset_token', $token)
            ->first();
        return $match !== null;
    }

    public function checkTokenExpirationTime($token, $email)
    {
        $tokenCreationTime = User::where('email', $email)
            ->where('reset_token', $token)
            ->get();

        $tokenTime = $tokenCreationTime->pluck('token_time')->toArray();
        $timeNow = date('Y-m-d H:i');

        $datetime1 = strtotime($tokenTime[0]);
        $datetime2 = strtotime($timeNow);
        $minutes = ($datetime2 - $datetime1) / 60;

        return $minutes < 60 ? false : true;
    }

    public function lastSeen($email, $dateTime)
    {
        $country = $this->geoData();
        $country = $country['code'] == null ? 'IT' : $country['code'];
        $update = DB::table('users')
            ->where('email', $email)
            ->update([
                'last_seen' => $dateTime,
                'country' => $country
            ]);
    }

    public function geoData()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $data = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
        return $geoData = [
            'code' => $data->geoplugin_countryCode,
            'country' => $data->geoplugin_countryName,
            'city' => $data->geoplugin_city
        ];
    }

    static function messages()
    {
        return [
            'email.required' => trans('auth.emailRequired'),
            'password.required' => trans('auth.passwordRequired'),
            'name.required' => trans('auth.nameRequired'),
            'name.min' => trans('auth.nameTooShort'),
            'email.unique' => trans('auth.emailAlreadyExists'),
            'password.min' => trans('auth.passwordTooShort'),
            'password_confirmation.same' => trans('auth.passwordMismatch'),
            'password_confirmation.required' => trans('auth.passConfirmationRequired')
        ];
    }
}
