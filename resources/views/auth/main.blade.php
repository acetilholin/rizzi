@extends('auth-master.master')
@section('content')
    <x-navbar title="Offerte" users="users" stats="stats" offers="" gallery="galleria"></x-navbar>
    <div class="container">
        <div class="row">
            <div class="col-12 mx-0">
            </div>
            <div class="add col-12">
                <div class="dropdown mt-2">
                    <button class="btn btn-custom hvr-underline-from-center dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ trans('offers.new') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#addOffer">
                            <i class="fas fa-list-ol"></i>  {{ trans('offers.offer') }}
                        </button>
                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#changeImage">
                            <i class="far fa-file-image"></i>  {{ trans('offers.image') }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="message-content mt-4 col-12">
                @include('messages.display')
                @yield('content')
            </div>
            <table class="table table-font text-center table-hover mb-5">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('offers.title') }}</th>
                    <th scope="col">{{ trans('offers.dates') }}</th>
                    <th scope="col">{{ trans('offers.active') }}</th>
                    <th scope="col">
                        {{ trans('offers.mp') }}
                        <i class="fas fa-info-circle" id="mp" style="color: lightgray" data-toggle="mp" title="Mezza pensione" data-placement="top"></i>
                    </th>
                    <th scope="col">
                        {{ trans('offers.pc') }}
                        <i class="fas fa-info-circle" id="pc" style="color: lightgray" data-toggle="pc" title="Pensione completa" data-placement="top"></i>
                    </th>
                    <th scope="col">{{ trans('offers.edit') }}</th>
                </tr>
                </thead>
                <tbody>
                @php ( $number = 1 )
                    @foreach($offers as $offer)
                        <tr>
                            <th scope="row">{{ $number++ }}</th>
                            <td>{{ $offer['title'] }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($offer['date_from'])->format('d.m.Y') }}
                                <span class="text-custom">/</span>
                                {{ \Carbon\Carbon::parse($offer['date_to'])->format('d.m.Y') }}
                            </td>
                            <td>{!! (boolean)$offer['active'] ? "<i class='fas fa-check'></i>" : "" !!}</td>
                            <td>{{ $offer['price_mp'] }}€</td>
                            <td>{{ $offer['price_pc'] }}€</td>
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
                                        <a class="edit dropdown-item m-item" href="{{ route('removeOffer', $offer['id']) }}">
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

            {{-- change image modal --}}
            <x-change-image></x-change-image>
        </div>
    </div>
@endsection
