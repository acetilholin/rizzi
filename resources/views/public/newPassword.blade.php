@extends('public.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4 center">
                <div class="name text-center">
                    <span>{{ env('APP_NAME') }}</span>
                </div>
                <form method="POST" action="{{ route('sendToken') }}">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                    </div>
                    @csrf
                    @include('messages.login-register')
                    @yield('content')
                    <div class="text-center" style="padding-top: 10px;">
                        &nbsp;<a href="{{ url('/login') }}" class="page-links" style="text-decoration: none">Accesso</a> | <a href="{{ url('/register') }}" class="page-links" style="text-decoration: none">Registrati</a>
                    </div>
                    <button type="submit" class="btn btn-custom remove-ml hvr-underline-from-center">Inviare</button>
                </form>
            </div>
        </div>
    </div>
@endsection
