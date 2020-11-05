@extends('public.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4 center">
                <div class="name text-center">
                    <span>{{ env('APP_NAME') }}</span>
                </div>
                <form method="POST" action="{{ route('loginUser') }}">
                    @if(isset($email))
                        <div class="text-center mb-2">
                            {{ trans('auth.hello') }} <span class="text-custom">{{ $name }}</span>
                            <input type="hidden" name="email" value="{{ $email }}">
                        </div>
                    @else
                        <div class="form-group">
                            <label for="email">{{ trans('auth.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="password">{{ trans('auth.pass') }}</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    @csrf
                    @include('messages.display')
                    @yield('content')
                    <div class="text-center" style="padding-top: 10px;">
                        &nbsp;<a href="{{ url('/register') }}" class="page-links" style="text-decoration: none">{{ trans('auth.register') }}</a> | <a href="{{ url('/new-password') }}" class="page-links" style="text-decoration: none">{{ trans('auth.fPass') }}</a>
                    </div>
                    <button type="submit" class="btn btn-custom remove-ml hvr-underline-from-center">{{ trans('auth.login') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
