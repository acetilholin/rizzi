@extends('auth-master.master')
@section('content')
    <x-navbar title="Utenti" users="" stats="stats" offers="offers"></x-navbar>
    <div class="container">
        <div class="row">
            @include('messages.info')
            @yield('content')
            <table class="table mt-3 text-center table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('users.name') }}</th>
                    <th scope="col">{{ trans('users.email') }}</th>
                    <th scope="col">{{ trans('users.approved') }}</th>
                    <th scope="col">{{ trans('users.lastLogin') }}</th>
                    <th scope="col">{{ trans('users.state') }} <i class="fas fa-info-circle" id="u-state" style="color: lightgray" data-toggle="country" title="Paese da cui l'utente ha effettuato l'ultimo accesso." data-placement="top"></i></th>
                    <th scope="col">{{ trans('users.online') }} <i class="fas fa-info-circle" id="u-online" style="color: lightgray" data-toggle="online" title="Utenti presenti negli ultimi 5 minuti." data-placement="top"></i></th>
                    <th scope="col">{{ trans('users.edit') }}</th>
                </tr>
                </thead>
                <tbody>
                @php ( $index = 1 )
                 @foreach($users as $user)
                     <tr>
                         <th scope="row">{{ $index++ }}</th>
                         <td>{{ $user['name'] }}</td>
                         <td>{{ $user['email'] }}</td>
                         <td>
                             {!! $user['approved'] ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}
                         </td>
                         <td>{{ $user['last_seen'] }}</td>
                         <td>{{ $user['country'] }}</td>
                         <td>online</td>
                         <td>
                             <div class="btn-group dropright">
                                 <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i class="fas fa-cog"></i>
                                 </button>
                                 <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                     <a class="edit dropdown-item m-item" id="{{ $user['id'] }}">
                                         <i class="far fa-edit"></i>
                                         {{ trans('offers.edit') }}
                                     </a>
                                     <a class="edit dropdown-item m-item" id="{{ $user['id'] }}">
                                         @if($user['approved'])
                                             <i class="fas fa-lock"></i>
                                             {{ trans('users.lock') }}
                                         @else
                                             <i class="fas fa-unlock"></i>
                                             {{ trans('users.unlock') }}
                                         @endif
                                     </a>
                                     <div class="dropdown-divider"></div>
                                     <a class="edit dropdown-item m-item" id="{{ $user['id'] }}">
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
        </div>
    </div>
@endsection
