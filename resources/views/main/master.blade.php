<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Hotel Rizzi">
    <meta name="author" content="Gregor Kosmina, kosmina.gregor@gmail.com">
    <meta name="description" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Hotel Rizzi</title>

    <!-- Styling files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/arrow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/fixed.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/hamburger.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/hover.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/waypoints.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
    <body data-spy="scroll" data-target="#navbarResponsive">
        @yield('content')
    </body>
</html>

<!-- Vue src file -->
<script src="{!! asset('js/app.js') !!}"></script>

<!-- JS -->
<script src="{!! asset('js/jquery-3.5.1.js') !!}"></script>
<script src="{!! asset('js/custom.js') !!}"></script>
<script src="{!! asset('js/hamburger.js') !!}"></script>
<script src="{!! asset('js/jquery.waypoints.min.js') !!}"></script>
<script src="{!! asset('js/lightbox.js') !!}"></script>
<script src="{!! asset('js/owl.carousel.min.js') !!}"></script>
<script src="{!! asset('js/validator.js') !!}"></script>
<script src="{!! asset('js/waypoints.js') !!}"></script>

<!-- Isotope -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<!-- FBox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
