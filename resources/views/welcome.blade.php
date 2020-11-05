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
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Casa</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">Storia</a>
                    </li>
                    <li class="nav-item">
                        <a href="#offers" class="nav-link">Offerte</a>
                    </li>
                    <li class="nav-item">
                        <a href="#inquiry" class="nav-link">Richiesta</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contatto</a>
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
                <h1 class="main-title">Benvenuti all' Hotel Rizzi</h1>
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
                    <h1 class="narow text-custom about-title">Conduzione Familiare</h1>
                    <p class="lead os-animation" data-animation="fadeInUp">
                        Gestito dalla famiglia Rizzi, è situato sulla
                        strada delle Dolomiti. Nei secoli scorsi era
                        denominato "Gasthof Sonne". L'edificio reca la data 1687 e la sua facciata
                        è ornata da un gran S.Cristoforo affrescato
                        e da un pregievole calvario ligneo.
                    </p>
                    <p class="lead os-animation" data-animation="fadeInUp">
                        Sono in possesso dell' albergo ancora gli
                        antichi registri forestieri di fine '800 inizio
                        '900 con importanti firme illustri, personaggi
                        del mondo scientifico, alpinistico, commerciale
                        e anche del primo mondo turistico.
                    </p><br>
                    <p class="text-center os-animation" data-animation="fadeInUp">
                        <a href="#inquiry" class="btn btn-custom hvr-underline-from-center">Richiesta</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="jumbotron m-0 py-5">
            <div class="container">
                <div class="row text-center">
                    <div class="filter mx-auto os-animation" data-animation="fadeInUp" >
                        <ul id="filters">
                            <li><a href="#" data-filter="*" class="current hvr-underline-from-center">Tutte</a></li>
                            <li><a href="#" class="hvr-underline-from-center" data-filter=".hotel">Hotel</a></li>
                            <li><a href="#" class="hvr-underline-from-center" data-filter=".rooms">Camere</a></li>
                            <li><a href="#" class="hvr-underline-from-center" data-filter=".dine">Sala da cena</a></li>
                            <li><a href="#" class="hvr-underline-from-center" data-filter=".stube">Weinstube</a></li>
                        </ul>
                    </div>
                    <div class="itemsContainer os-animation" data-animation="fadeInUp">
                        <ul class="items">
                            <li onclick="" class="hotel col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/hotel1.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/hotel1.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="hotel col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/hotel2.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/hotel2.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="hotel col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/hotel3.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/hotel3.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="rooms col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/room1.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/room1.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="rooms col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/room2.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/room2.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="rooms col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/room3.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/room3.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="rooms col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/room4.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/room4.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="rooms col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/room5.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/room5.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="rooms col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/room6.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/room6.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="dine col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/dine1.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/dine1.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="dine col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/dine2.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/dine2.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="dine col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/dine3.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/dine3.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="stube col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/stube1.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/stube1.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="stube col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/stube2.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/stube2.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="stube col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/stube3.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/stube3.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
                            <li onclick="" class="stube col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/stube4.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/stube4.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="image-overlay"></div>
                                </div>
                            </li>
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
                    <h3 class="heading">Offerte</h3>
                    <div class="heading-underline"></div>
                </div>
                <div class="">
                    <div class="os-animation" data-animation="fadeInUp">
                        <div id="offers-carousel" class="owl-carousel owl-theme">

                            @foreach($offers as $offer)
                                <div class="card">
                                    <div class="card-header text-custom text-center">
                                       {{ $offer['title'] }}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            {{ date("d.m.Y", strtotime($offer['date_from'])) }} - {{ date("d.m.Y", strtotime($offer['date_to'])) }}
                                        </h5>
                                        <p class="card-text border-bottom py-2 text-center">{!! $offer['subtitle'] !!}</p>
                                        @if($offer['price_mp'] > 0)
                                            <h6 class="text-custom text-center">Mezza Pensione {{ number_format($offer['price_mp'],2,',','.') }}€</h6>
                                        @endif
                                        @if($offer['price_pc'] > 0)
                                            <h6 class="text-custom text-center">Pensione Ccompleta {{ number_format($offer['price_pc'],2,',','.') }}€</h6>
                                        @endif
                                        <div class="btn btn-custom hvr-underline-from-center btn-card mx-auto d-block cursor" data-toggle="modal" data-target="#offer">
                                            più
                                        </div>
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
                <h3 class="heading">Richiesta</h3>
                <div class="heading-underline"></div>
            </div>
            <div class="os-animation" data-animation="fadeInLeft">
                <div id="inquiryForm">
                    <inquiry></inquiry>
                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="offset">
        <footer>
            <div class="container c-padding">
                <div class="row">
                    <div class="col-md-5 b-right mx-2">
                        <p class="text-contact">Hotel Rizzi</p>
                        <p>Piaza de Salin 6,<br>Pera di Fassa (TN) 38036</p>
                        <p>
                            <i class="fas fa-phone-volume"></i> +39 0462 764123<br>
                            <i class="fas fa-fax"></i> +39 0462 764123<br>
                            <i class="far fa-envelope"></i> albergorizzi@gmail.com<br>
                        </p>
                        <a href="http://bit.ly/hotel-rizzi" target="_blank" class="btn btn-custom hvr-underline-from-center remove-ml">
                            <i class="fas fa-map-marker-alt"></i>
                            Arrivare
                        </a>
                    </div>
                    <div class="col-md-6 ml-2" id="contactForm">
                        <contact></contact>
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
    <div class="icon-bar">
        <a href="https://www.facebook.com/Hotel-Rizzi-246131208760487" target="_blank" class="hvr-underline-from-center">
            <i class="fab fa-facebook-f"></i>
        </a>
    </div>
    <!-- Modal -->
    <x-offer></x-offer>

    <!-- Modal Privacy -->
    <x-privacy></x-privacy>
@endsection
