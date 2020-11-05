@extends('auth-master.master')
@section('content')
    <div class="col-md-4 offset-4">
        <div class="center text-center">
                    <div>
                        <img src="{{ asset('img/logo-t.png') }}" class="img-spacing" style="height: 60px">
                    </div>
            {!! trans('general.404') !!}
        </div>
    </div>
@endsection
<style>
    .img-spacing {
        margin-bottom: 2rem;
    }
    .center {
        margin-top: 45%;
        font-size: 1.3rem;
    }
</style>
