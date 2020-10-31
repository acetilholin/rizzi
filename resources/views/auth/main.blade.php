@extends('auth-master.master')
@section('content')
    <x-navbar title="Offerte" users="users" stats="stats" offers=""></x-navbar>
    <div class="container">
        <div class="row">
            <div class="add col-12">
                <div class="btn btn-custom hvr-underline-from-center" data-toggle="modal" data-target="#addOffer">{{ trans('offers.new') }}</div>
            </div>
            @include('messages.info')
            @yield('content')
            <table class="table mt-3 text-center table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('offers.title') }}</th>
                    <th scope="col">{{ trans('offers.dates') }}</th>
                    <th scope="col">{{ trans('offers.active') }}</th>
                    <th scope="col">{{ trans('offers.edit') }}</th>
                </tr>
                </thead>
                <tbody>
                @php ( $index = 1 )
                 @foreach($offers as $offer)
                     <tr>
                         <th scope="row">{{ $index++ }}</th>
                         <td>{{ $offer['title'] }}</td>
                         <td>
                             {{ \Carbon\Carbon::parse($offer['date_from'])->format('d.m.Y') }}
                             <span class="text-custom">/</span>
                             {{ \Carbon\Carbon::parse($offer['date_to'])->format('d.m.Y') }}
                         </td>
                         <td>{!! (boolean)$offer['active'] ? "<i class='fas fa-check'></i>" : "" !!}</td>
                         <td>
                             <div class="btn-group dropright">
                                 <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i class="fas fa-cog"></i>
                                 </button>
                                 <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                     <a class="edit dropdown-item m-item" id="{{ $offer['id'] }}">
                                         <i class="far fa-edit"></i>
                                         {{ trans('offers.edit') }}
                                     </a>
                                     <div class="dropdown-divider"></div>
                                     <a class="edit dropdown-item m-item" id="{{ $offer['id'] }}">
                                         <i class="far fa-trash-alt remove"></i>
                                         {{ trans('offers.remove') }}
                                     </a>
                                 </ul>
                             </div>
                         </td>
                     </tr>
                 @endforeach
                </tbody>
            </table>

            {{-- add offer modal --}}
            <x-add-offer></x-add-offer>

            {{-- edit offer modal --}}
            <x-edit-offer></x-edit-offer>
        </div>
    </div>
@endsection
