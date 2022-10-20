@extends('layouts.home',['title'=>'Service-Interphone | '.env("APP_NAME")])
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('template/images/interphon-bg.jpg')}})"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">L'installation d'équipements d'interphonie à Saint-Denis</h1>
                <p style="color: white">Votre satisfaction est notre priorité !</p>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Acceuil <i
                                class="ion-ios-arrow-forward"></i></a></span> <span> Service <i
                            class="ion-ios-arrow-forward"></i> Interphonie <i class="ion-ios-arrow-forward"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 mt-2"
                style="background-image: url({{asset('template/images/interphon-2.jpg')}})">
            </div>
            <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section mb-5 pl-md-5">
                    <div class="pl-md-5 ml-md-5">
                        <span class="subheading subheading-with-line"><small
                                class="pr-2 bg-white">Interphonie</small></span>
                        <h2 class="mb-4">Communiquez en toute sécurité avec vos visiteurs !</h2>
                    </div>
                </div>
                <div class="pl-md-5 ml-md-5 mb-5">
                    <p>
                        L'installation d'interphone vous offre une sécurité supplémentaire au sein de votre logement et vous permet d'améliorer
                        le confort de votre vie.
                        Remplacez alors votre sonnette par un interphone afin de ne pas ouvrir votre porte avant de savoir qui se présente.
                    </p>
                    </p>
                </div>
                <p class="text-center"><a href="{{route('contact-us')}}"
                        class="btn btn-primary px-4 py-3 mt-3">Installez votre Interphone</a>
                </p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 mt-2"
                style="background-image: url({{asset('template/images/interphon-1.jpg')}})">
            </div>
            <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section mb-5 pl-md-5">
                    <div class="pl-md-5 ml-md-5">
                        <h2 class="mb-4">Installez un interphone qui répond parfaitement à vos demandes</h2>
                    </div>
                </div>
                <div class="pl-md-5 ml-md-5 mb-5">
                    <p>
                        Que ce soit pour l'installation d'interphone, d'alarme ou d'une caméra de surveillance, notre société vous propose des
                        contrats de maintenance.
                    </p>
                    </p>
                </div>
                <p class="text-center"><a href="{{route('contact-us')}}"
                        class="btn btn-primary px-4 py-3 mt-3">Installez votre Interphone</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection