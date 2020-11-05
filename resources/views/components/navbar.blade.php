<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a href="{{ url('/main') }}" class="brand">{{ env('APP_NAME') }}</a>
        <span class="title mx-auto mt-2 mt-lg-0">{{ $title }}</span>
        <div class="form-inline my-2 my-lg-0">
            @if(empty(!$stats))
                <span class="nav-page" data-toggle="tooltip" data-placement="top" id="t-stat" title="Statistiche">
                        <a href="{{ url('statistics') }}"><i class="fas fa-chart-line"></i></a>
                    </span>
            @endif
            @if(empty(!$users))
                <span class="nav-page" data-toggle="tooltip" data-placement="top" id="t-users" title="Utenti">
                        <a href="{{ url('/users') }}"><i class="fas fa-users"></i></a>
                    </span>
            @endif
            @if(empty(!$offers))
                <span class="nav-page" data-toggle="tooltip" data-placement="top" id="t-offers" title="Offerte">
                        <a href="{{ url('/main') }}"><i class="fas fa-list-ol"></i></a>
                    </span>
            @endif
            <form action="">
                <a href="{{ route('logout') }}" class="btn btn-custom btn-sm hvr-underline-from-center" title="Disconnettersi" type="submit" style="margin: 0"><i class="fas fa-sign-out-alt"></i></a>
            </form>
        </div>
    </div>
</nav>
