<?php


namespace App\helpers;


class UserHelper
{
    public function messages()
    {
        return [
            'email.required' => trans('messages.emailRequired'),
            'password.required' => trans('messages.passwordRequired'),
            'name.required' => trans('messages.nameRequired'),
            'name.min' => trans('messages.nameTooShort'),
            'email.unique' => trans('messages.emailAlreadyExists'),
            'password.min' => trans('messages.passwordTooShort'),
            'password_confirmation.same' => trans('messages.passwordMissmatch'),
            'password_confirmation.required' => trans('messages.passConfirmationRequired'),
            'token.required' => trans('messages.tokenRequired')
        ];
    }
}
