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
                            <li><a href="#" data-filter="*" class="current hvr-underline-from-center">Tutto</a></li>
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
                                    <img src="{{ asset('img/gallery/hotel5.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/hotel5.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
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
                            <li onclick="" class="hotel col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/hotel4.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/hotel4.jpg') }}" class="openButton" data-fancybox="images" data-caption="Hotel">
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
                            <li onclick="" class="dine col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <img src="{{ asset('img/gallery/dine1.jpg') }}">
                                    <div class="icons">
                                        <a href="{{ asset('img/gallery/dine1.jpg') }}" class="openButton" data-fancybox data-caption="Hotel">
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
                                        <a href="{{ asset('img/gallery/dine2.jpg') }}" class="openButton" data-fancybox data-caption="Hotel">
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
                                        <a href="{{ asset('img/gallery/dine3.jpg') }}" class="openButton" data-fancybox data-caption="Hotel">
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
                                        <a href="{{ asset('img/gallery/stube1.jpg') }}" class="openButton" data-fancybox data-caption="Hotel">
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
                                        <a href="{{ asset('img/gallery/stube2.jpg') }}" class="openButton" data-fancybox data-caption="Hotel">
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
                                        <a href="{{ asset('img/gallery/stube3.jpg') }}" class="openButton" data-fancybox data-caption="Hotel">
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
                                        <a href="{{ asset('img/gallery/stube4.jpg') }}" class="openButton" data-fancybox data-caption="Hotel">
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

                            <div class="card">
                                <div class="card-header text-custom text-center">
                                    Natale 2020
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">21.12.2020 - 26.12.2020</h5>
                                    <p class="card-text border-bottom py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut blanditiis commodi culpa doloremque expedita facilis labore magnam non perspiciatis praesentium rem, repellat reprehenderit saepe vel!</p>
                                    <h6 class="text-custom text-center">MP 38€</h6>
                                    <h6 class="text-custom text-center">PC 44€</h6>
                                    <div class="btn btn-custom hvr-underline-from-center btn-card mx-auto d-block" data-toggle="modal" data-target="#offer">
                                        più
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header text-custom text-center">
                                    Capodanno 2020
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">26.12.2020 - 05.01.2021</h5>
                                    <p class="card-text border-bottom py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut blanditiis commodi culpa doloremque expedita facilis labore magnam non perspiciatis praesentium rem, repellat reprehenderit saepe vel!</p>
                                    <h6 class="text-custom text-center">MP 38€</h6>
                                    <h6 class="text-custom text-center">PC 44€</h6>
                                    <div class="btn btn-custom hvr-underline-from-center btn-card mx-auto d-block">
                                        più
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header text-custom text-center">
                                    Settimane bianche
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">05.01.2021 - 08.02.2021</h5>
                                    <p class="card-text border-bottom py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut blanditiis commodi culpa doloremque expedita facilis labore magnam non perspiciatis praesentium rem, repellat reprehenderit saepe vel!</p>
                                    <h6 class="text-custom text-center">MP 38€</h6>
                                    <h6 class="text-custom text-center">PC 44€</h6>
                                    <div class="btn btn-custom hvr-underline-from-center btn-card  mx-auto d-block">
                                        più
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header text-custom text-center">
                                    Carnevale 2020
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">21.2.2021 - 25.2.2021</h5>
                                    <p class="card-text border-bottom py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut blanditiis commodi culpa doloremque expedita facilis labore magnam non perspiciatis praesentium rem, repellat reprehenderit saepe vel!</p>
                                    <h6 class="text-custom text-center">MP 38€</h6>
                                    <h6 class="text-custom text-center">PC 44€</h6>
                                    <div class="btn btn-custom hvr-underline-from-center btn-card mx-auto d-block">
                                        più
                                    </div>
                                </div>
                            </div>

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
                <form>
                    <div class="row inquiry">
                        <div class="form-group col-1">
                            <label for="title">Titolo</label>
                            <select class="custom-select" id="title" name="title">
                                <option selected></option>
                                <option value="1">Sig.</option>
                                <option value="2">Sig.ra</option>
                                <option value="3">Fam</option>
                            </select>
                        </div>
                        <div class="form-group col-2">
                            <label for="name">Nome *</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group col-2">
                            <label for="surname">Cognome *</label>
                            <input type="text" class="form-control" id="surname" name="surname">
                        </div>
                        <div class="form-group col-3">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group col-2">
                            <label for="adults">Adulti *</label>
                            <select class="custom-select" id="adults" name="adults">
                                <option selected="selected">2 Adulti</option>
                                <option value="1">1 Adulto</option>
                                <option value="2">2 Adulti</option>
                                <option value="3">3 Adulti</option>
                                <option value="4">4 Adulti</option>
                                <option value="5">5 Adulti</option>
                                <option value="6">6 Adulti</option>
                                <option value="7">7 Adulti</option>
                                <option value="8">8 Adulti</option>
                                <option value="9">9 Adulti</option>
                                <option value="10">10 Adulti</option>
                            </select>
                        </div>
                        <div class="form-group col-2">
                            <label for="kids">Bambini *</label>
                            <select class="custom-select" id="kids" name="kids">
                                <option selected="selected">0 Bambini</option>
                                <option value="0">0 Bambini</option>
                                <option value="1">1 Bambino</option>
                                <option value="2">2 Bambini</option>
                                <option value="3">3 Bambini</option>
                                <option value="4">4 Bambini</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-3">
                            <label for="board">Pensione *</label>
                            <select class="custom-select" id="board" name="board">
                                <option selected="selected">Mezza pensione</option>
                                <option value="MP">Mezza pensione</option>
                                <option value="PC">Pensione completa</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="datepicker1">Arrivo *</label>
                            <input type="text" class="form-control" id="datepicker1" name="dateFrom" placeholder="Arrivo *" required>
                        </div>
                        <div class="form-group col-3">
                            <label for="datepicker2">Partenza *</label>
                            <input type="text" class="form-control" id="datepicker2" name="dateTo" placeholder="Partenza *" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        I dati vengono trattati ai sensi del Regolamento (UE) 2016/679 del Parlamento europeo e del Consiglio.<br><br>
                    </div>
                    <div class="row">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Accetto la normativa sulla privacy</label>
                        </div>
                    </div>
                    <div class="row mt-1">
                        * Campo obbligatorio
                    </div>
                    <div class="btn btn-custom btn-inquiry hvr-underline-from-center">Inviare</div>
                </form>
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
                        <form>
                            <div class="form-group">
                                <label for="fullnameContact">Nome e cognome</label>
                                <input type="text" class="form-control" id="fullnameContact" aria-describedby="emailHelp" placeholder="Inserisci il tuo nome e cognome">
                            </div>
                            <div class="form-group">
                                <label for="emailContact">Email</label>
                                <input type="email" class="form-control" id="emailContact" aria-describedby="emailHelp" placeholder="Inserisci l'email">
                            </div>
                            <div class="form-group">
                                <label for="msgContact">Messaggio</label>
                                <textarea class="form-control" id="msgContact" rows="4" aria-describedby="emailHelp" placeholder="Inserisci il tuo messaggio"></textarea>
                            </div>
                            <button type="submit" class="btn btn-custom remove-ml hvr-underline-from-center">
                                <i class="far fa-envelope"></i> Inviare
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright pt-5 pb-4">
                &copy; Hotel Rizzi 2020
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
    <div class="modal fade" id="offer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Natale 2020</h5>
                </div>
                <div class="modal-body">
                    <div class="dates text-center text-custom">21.12.2020 - 26.12.2020</div>
                    <p class="mt-2 lead">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error facere facilis iure labore possimus, recusandae.
                    </p>
                    <p class="mt-1 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto deserunt earum eius et explicabo id maxime nam repellat totam, vel!</p>
                    <p class="text-custom text-center">
                        Mezza pensione: 48€<br>
                        Pensione completa: 55€<br>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-custom hvr-underline-from-center" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
@endsection
