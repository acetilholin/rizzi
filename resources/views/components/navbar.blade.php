<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="brand" href="{{ route('main') }}">{{ env('APP_NAME') }}</a>
            <span class="title mr-auto mt-2 mt-lg-0">{{ $title }}</span>
            <div class="form-inline my-2 my-lg-0">
                <form action="">
                    <a href="{{ route('logout') }}" class="btn btn-custom btn-sm hvr-underline-from-center" title="Disconnettersi" type="submit" style="margin: 0"><i class="fas fa-sign-out-alt"></i></a>
                </form>
            </div>
        </div>
    </nav>
</div>
