@extends('auth-master.master')
@section('content')
    <x-navbar title="Galleria" users="users" stats="stats" offers="offerte" gallery=""></x-navbar>
    <div class="container">
        <div class="row">
            <div class="message-content mt-4 col-12">
                @include('messages.display')
                @yield('content')
            </div>
            <table class="table mt-3 text-center table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('image.category') }}</th>
                    <th scope="col">{{ trans('image.image') }}</th>
                    <th scope="col">
                        {!! Html::image('countries/it.svg','drzava', array('width' => '30px', 'height' => '30px')) !!}
                    </th>
                    <th>
                        {!! Html::image('countries/gb.svg','drzava', array('width' => '30px', 'height' => '30px')) !!}
                    </th>
                    <th scope="col">{{ trans('image.edit') }}</th>
                </tr>
                </thead>
                <tbody>
                @php ( $index = 1 )
                @foreach($images as $image)
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td>{{ trans('image.'.$image->category) }}</td>
                        <td><img src="../{{ $image->path }}" class="open-image" width="80px" height="45px" id="{{ $image->id }}" style="cursor: zoom-in"></td>
                        <td>{{ $image->caption_it }}</td>
                        <td>{{ $image->caption_en }}</td>
                        <td class="pointer">
                            <div class="btn btn-custom" style="margin: 0; padding: 5px 10px">
                                <i class="edit-image fas fa-pencil-alt" id="{{ $image->id }}"></i>
                            </div>
                        </td>
                    </tr>
                    @php  ( $index ++ )
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--  image modal  -->
    <x-image-modal></x-image-modal>

    <!-- update image  -->
    <x-update-image></x-update-image>

@endsection

