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
                        <label for="token">Token</label>
                        <input type="text" class="form-control" id="token" name="token" placeholder="Token">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <small id="emailHelp" class="form-text text-muted">La lunghezza minima è di 6 caratteri</small>
                        <input type="password" class="form-control" id="password1" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password2">Password</label>
                        <input type="password" class="form-control" id="password2" name="password_confirmation" placeholder="Ripeti la password">
                    </div>
                    @csrf
                    @include('messages.login-register')
                    @yield('content')
                    <div class="text-center" style="padding-top: 10px;">
                        &nbsp;<a href="{{ url('/login') }}" class="page-links" style="text-decoration: none">Accesso</a> | <a href="{{ url('/new-password') }}" class="page-links" style="text-decoration: none">Password dimenticata</a>
                    </div>
                    <button type="submit" class="btn btn-custom remove-ml hvr-underline-from-center">Inviare</button>
                </form>
            </div>
        </div>
    </div>
@endsection
