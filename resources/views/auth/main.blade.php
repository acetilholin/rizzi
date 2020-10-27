@extends('auth-master.master')
@section('content')
    <x-navbar title="Offerte"></x-navbar>
    <div class="container">
        <div class="row">
            <div class="add">
                <div class="btn btn-custom hvr-underline-from-center" data-toggle="modal" data-target="#addOffer">{{ trans('offers.new') }}</div>
            </div>
            <table class="table mt-3">
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
                         <td>{{ $offer['date_from'] }} - {{ $offer['date_to'] }}</td>
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
            <div class="modal fade" id="addOffer" tabindex="-1" aria-labelledby="addOffer" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('offers.newOffer') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-custom hvr-underline-from-center" data-dismiss="modal">{{ trans('offers.close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- edit offer modal --}}
            <div class="modal fade" id="editOffer" tabindex="-1" aria-labelledby="editOffer" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('offers.editOffer') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-custom hvr-underline-from-center" data-dismiss="modal">{{ trans('offers.close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
