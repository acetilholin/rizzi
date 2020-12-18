@extends('main.master')
@section('content')
    <div class="loader">
        <div class="inner"></div>
    </div>
    <div id="home">
        <nav class="navbar navbar-expand-lg fixed-top">
            <a href="#" class="navbar-brand text-light">
                <span class="brand h2">Hotel Rizzi</span>
            </a>
            <button class="navbar-toggler hamburger hamburger--collapse" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                 <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                 </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            EN
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('italian') }}">IT</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">Story</a>
                    </li>
                    <li class="nav-item">
                        <a href="#offers" class="nav-link">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a href="#inquiry" class="nav-link">Request</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="page-overlay">
            <div class="landing">
                <div class="home-wrap">
                    <div class="home-inner"></div>
                </div>
            </div>
        </div>
        <div class="caption text-center">
            <div class="os-animation slow" data-animation="fadeInUp" data-delay=".1">
                <h1 class="main-title">Welcome to Hotel Rizzi</h1>
            </div>
        </div>
        <a href="#about" class="down-arrow text-center">
            <div class="mouse-animation d-none d-md-block">
                <div class="mouse"></div>
            </div>
        </a>
    </div>
    <div id="about" class="offset section">
        <div class="light">
            <div class="row text-center os-animation justify-content-center" data-animation="fadeInUp">
                <div class="col-11 col-md-10 col-lg-9">
                    <h1 class="narow text-custom about-title">Family owned</h1>
                    <p class="lead os-animation" data-animation="fadeInUp">
                        Managed by the Rizzi family, it is located on the Dolomites road.
                        In past centuries it was called "Gasthof Sonne". The building bears
                        the date 1687 and its façade is adorned with a large frescoed S.
                        Cristoforo and a valuable wooden Calvary.
                    </p>
                    <p class="lead os-animation" data-animation="fadeInUp">
                        The ancient foreign registers
                        of the late 19th and early 20th century are still in possession
                        of the hotel with important illustrious signatures, personalities from
                        the scientific, mountaineering, commercial and even the first world of tourism.
                    </p><br>
                    <p class="text-center os-animation" data-animation="fadeInUp">
                        <a href="#inquiry" class="btn btn-custom hvr-underline-from-center">Request</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="jumbotron m-0 py-5">
            <div class="container">
                <div class="row text-center">
                    <div class="filter mx-auto os-animation" data-animation="fadeInUp" >
                        <ul id="filters">
                            <li><a href="#" data-filter="*" class="current hvr-underline-from-center">All</a></li>
                            <li><a href="#" class="hvr-underline-from-center" data-filter=".hotel">Hotel</a></li>
                            <li><a href="#" class="hvr-underline-from-center" data-filter=".rooms">Rooms</a></li>
                            <li><a href="#" class="hvr-underline-from-center" data-filter=".dine">Dining hall</a></li>
                            <li><a href="#" class="hvr-underline-from-center" data-filter=".stube">Weinstube</a></li>
                        </ul>
                    </div>
                    <div class="itemsContainer os-animation" data-animation="fadeInUp">
                        <ul class="items">
                            @foreach($images as $image)
                                <li onclick="" class="{!! $image->category !!} col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="item">
                                        <img src="{{ $image->path }}">
                                        <div class="icons">
                                            <a href="{{ $image->path }}" class="openButton" data-fancybox="images" data-caption="{!! $image->caption_en !!}">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="image-overlay"></div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="offers" class="offset">
        <div class="fixed-background">
            <div class="light">
                <div class="col-12 text-center os-animation" data-animation="fadeInUp">
                    <h3 class="heading">Offers</h3>
                    <div class="heading-underline"></div>
                </div>
                <div class="">
                    <div class="os-animation" data-animation="fadeInUp">
                        <div id="offers-carousel" class="owl-carousel owl-theme">

                            @foreach($offers as $offer)
                                <div class="card">
                                    <div class="card-header text-custom text-center">
                                        {{ $offer['title_en'] }}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            {{ date("d.m.Y", strtotime($offer['date_from'])) }} - {{ date("d.m.Y", strtotime($offer['date_to'])) }}
                                        </h5>
                                        <p class="card-text py-2 text-center">{!! $offer['subtitle_en'] !!}</p>
                                        <div class="border-bottom mb-2 mt-1"></div>
                                        @if($offer['price_mp'] > 0)
                                            <h6 class="text-center">
                                                Half board
                                                <span class="text-custom">{{ number_format($offer['price_mp'],2,',','.') }}€</span>
                                            </h6>
                                        @endif
                                        @if($offer['price_pc'] > 0)
                                            <h6 class="text-center">
                                                Full board
                                                <span class="text-custom">{{ number_format($offer['price_pc'],2,',','.') }}€</span>
                                            </h6>
                                        @endif
                                       {{-- <div class="btn btn-custom hvr-underline-from-center btn-card mx-auto d-block cursor" data-toggle="modal" data-target="#offer">
                                            more
                                        </div>--}}
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed-wrap">
                <div id="fixed-2"></div>
            </div>
        </div>
    </div>
    <div id="inquiry" class="offset">
        <div class="narrow">
            <div class="col-12 os-animation" data-animation="fadeInUp">
                <h3 class="heading">Request</h3>
                <div class="heading-underline"></div>
            </div>
            <div class="os-animation" data-animation="fadeInLeft">
                <div id="inquiryForm">
                    <inquiry lang="en-GB" send="Send"></inquiry>
                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="offset">
        <footer>
            <div class="container c-padding">
                <div class="row justify-content-center">
                    <div class="col-md-5 offset-md-3 ml-2 b-right mobile-padding" id="contactForm">
                        <contact lang="en-GB" send="Send"></contact>
                    </div>
                    <div class="col-md-4 mx-2 padding">
                        <p class="text-contact">Hotel Rizzi</p>
                        <p>Piaza de Salin 6,<br>Pera di Fassa (TN) 38036</p>
                        <p>
                            <i class="fas fa-phone-volume"></i> +39 0462 764123<br>
                            <i class="fas fa-fax"></i> +39 0462 764123<br>
                            <i class="far fa-envelope"></i> albergorizzi@gmail.com<br>
                        </p>
                        <a href="http://bit.ly/hotel-rizzi" target="_blank" class="btn btn-custom hvr-underline-from-center remove-ml">
                            <i class="fas fa-map-marker-alt"></i>
                            Arrival
                        </a>
                    </div>
                </div>
            </div>
            <div class="copyright pt-5 pb-4">
                &copy; Hotel Rizzi 2020 / VAT ID IT01729970226
            </div>
        </footer>
    </div>
    <a class="toTop hvr-icon-up" href="#home">
        <i class="fas fa-arrow-circle-up hvr-icon"></i>
    </a>
    <a class="icon hvr-icon-shrink" href="https://www.facebook.com/Hotel-Rizzi-246131208760487" target="_blank">
        <i class="fab fa-facebook-f hvr-icon"></i>
    </a>

    <!-- Modal -->
    <x-offer></x-offer>

    <!-- Modal Privacy -->
    <x-privacy></x-privacy>
@endsection
