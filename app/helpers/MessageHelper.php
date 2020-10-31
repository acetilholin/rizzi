<?php


namespace App\helpers;


class MessageHelper
{
    static function format($erorrs)
    {
        $data = [];
        for ($i = 0; $i < sizeof($erorrs); $i++) {
            if ($i + 1 < sizeof($erorrs)) {
                array_push($data, $erorrs[$i].", ");
            } else {
                array_push($data, $erorrs[$i].".");
            }
        }
        return $data;
    }

    static function messages()
    {
        return [
            'fullname.required' => trans('messages.fullnameRequired'),
            'fullname.min' => trans('messages.fullnameMin'),
            'email.required' => trans('messages.emailRequired'),
            'email.email' => trans('messages.emailFormat'),
            'message.required' => trans('messages.messageRequired'),
            'message.min' => trans('messages.messageMin')
        ];
    }
}
