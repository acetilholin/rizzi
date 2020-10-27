@extends('public.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4 center">
                <div class="name text-center">
                    <span>{{ env('APP_NAME') }}</span>
                </div>
                <form method="POST" action="{{ route('resetPassword') }}">
                    <div class="form-group">
                        <label for="token">{{ trans('auth.token') }}</label>
                        <input type="text" class="form-control" id="token" name="token" placeholder="Token">
                    </div>
                    <div class="form-group">
                        <label for="email">{{ trans('auth.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="password1">{{ trans('auth.pass') }}</label>
                        <small id="emailHelp" class="form-text text-muted">{{ trans('auth.passMinLen') }}</small>
                        <input type="password" class="form-control" id="password1" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password2">{{ trans('auth.pass') }}</label>
                        <input type="password" class="form-control" id="password2" name="password_confirmation" placeholder="Ripeti la password">
                    </div>
                    @csrf
                    @include('messages.login-register')
                    @yield('content')
                    <div class="text-center" style="padding-top: 10px;">
                        &nbsp;<a href="{{ url('/login') }}" class="page-links" style="text-decoration: none">{{ trans('auth.login') }}</a> | <a href="{{ url('/new-password') }}" class="page-links" style="text-decoration: none">{{ trans('auth.fPass') }}</a>
                    </div>
                    <button type="submit" class="btn btn-custom remove-ml hvr-underline-from-center">{{ trans('auth.send') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
