@extends('layouts.home',['title'=>'Service-Vidéophonie | '.env("APP_NAME")])
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('template/images/about-bg.jpg')}})"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">DIRECT-VISION assure la sécurité de votre domicile à Saint-Denis</h1>
                <p style="color: white">À votre service depuis l'année 2000 !</p>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Acceuil <i
                                class="ion-ios-arrow-forward"></i></a></span> <span> Service <i
                            class="ion-ios-arrow-forward"></i> Vidéophonie <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 mt-2"
                style="background-image: url({{asset('template/images/service-1.jpg')}})">
            </div>
            <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section mb-5 pl-md-5">
                    <div class="pl-md-5 ml-md-5">
                        <span class="subheading subheading-with-line"><small
                                class="pr-2 bg-white">Vidéophonie</small></span>
                        <h2 class="mb-4">Les meilleures solutions de vidéophonie à Saint-Denis</h2>
                    </div>
                </div>
                <div class="pl-md-5 ml-md-5 mb-5">
                    <p>
                        Désirez-vous remplacer vote ancienne sonnette par un équipement qui vous permet d'entendre et de
                        voir qui
                        est à votre
                        porte ?
                        Nous vous conseillons donc d'installer un vidéophone pour gagner en termes de confort et
                        d'ergonomie.
                        Notre équipe saura vous conseiller sur le vidéophone le plus adapté à vos installations.
                    </p>
                    </p>
                </div>
                <p class="text-center"><a href="{{route('contact-us')}}"
                        class="btn btn-primary px-4 py-3 mt-3">Installez votre Caméra</a>
                </p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 mt-2"
                style="background-image: url({{asset('template/images/service-2.jpg')}})">
            </div>
            <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section mb-5 pl-md-5">
                    <div class="pl-md-5 ml-md-5">
                        <h2 class="mb-4">Les meilleurs installeurs de caméras de surveillance en Île-de-France</h2>
                    </div>
                </div>
                <div class="pl-md-5 ml-md-5 mb-5">
                    <p>
                        Souhaitez-vous surveiller votre maison où que vous soyez ? Optez pour l'installation d'une
                        caméra de surveillance afin
                        de surveiller les activités suspectes (vol, invasion, etc.).
                        Découvrez nos services liés aux systèmes d'alarme.
                    </p>
                    </p>
                </div>
                <p class="text-center"><a href="{{route('contact-us')}}"
                        class="btn btn-primary px-4 py-3 mt-3">Installez votre Caméra</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection