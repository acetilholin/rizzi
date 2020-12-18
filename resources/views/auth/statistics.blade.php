@extends('auth-master.master')
@section('content')
    <x-navbar title="Statistiche" users="users" stats="" offers="Offerte" gallery="galleria"></x-navbar>
    <div class="container">
        <div class="row">
            <div id="chart" class="col-12 mt-5">
                <chart></chart>
            </div>
        </div>
    </div>
@endsection
