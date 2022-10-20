@extends('layouts.home', ['title'=>'Service-Arlame | '.env("APP_NAME")])
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('template/images/alarm-bg.jpg')}})"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">L'installation de vos équipements d'alarme à Saint-Denis</h1>
                <p style="color: white">Bénéficiez d'un accompagnement sur-mesure !</p>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Acceuil <i
                                class="ion-ios-arrow-forward"></i></a></span> <span> Service <i
                            class="ion-ios-arrow-forward"></i> Alarme <i class="ion-ios-arrow-forward"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 mt-2"
                style="background-image: url({{asset('template/images/alarm-2.jpg')}})">
            </div>
            <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section mb-5 pl-md-5">
                    <div class="pl-md-5 ml-md-5">
                        <span class="subheading subheading-with-line"><small
                                class="pr-2 bg-white">Alarme</small></span>
                        <h2 class="mb-4">Protégez vos biens grâce à une alarme adaptée à Paris</h2>
                    </div>
                </div>
                <div class="pl-md-5 ml-md-5 mb-5">
                    <p>
                        Un système d'alarme vous permet de protéger votre domicile, votre entreprise, vos biens et vos proches.
                        Contactez-nous pour découvrir nos solutions d'alarme pour protéger votre maison contre toute intrusion ou tentative
                        d'effraction.
                    </p>
                    </p>
                </div>
                <p class="text-center"><a href="{{route('contact-us')}}"
                        class="btn btn-primary px-4 py-3 mt-3">Installez votre Alarme</a>
                </p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 mt-2"
                style="background-image: url({{asset('template/images/alarm-1.jpg')}})">
            </div>
            <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section mb-5 pl-md-5">
                    <div class="pl-md-5 ml-md-5">
                        <h2 class="mb-4">L'alarme en tant que solution de sécurité pratique</h2>
                    </div>
                </div>
                <div class="pl-md-5 ml-md-5 mb-5">
                    <p>
                        L'installation d'une alarme est une solution efficace pour identifier un danger qui menace les biens ou les personnes
                        occupant le logement afin de prévenir les propriétaires.
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