@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert" id="message">
        {{ $message }}
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger" role="alert" id="message">
        {{ $message }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" role="alert" id="message">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif
@if(isset($info))
    <div class="alert alert-info text-center" role="alert" id="message">
        {{ $info }}
    </div>
@endif
