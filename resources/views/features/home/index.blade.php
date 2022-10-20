@extends('layouts.home')
@push("css")
{{-- Toast --}}
    <link rel="stylesheet" href="{{asset('toast/dist/css/toast.min.css')}}">
@endpush
@section('content')
<section class="home-slider js-fullheight owl-carousel bg-white">
    <div class="slider-item js-fullheight">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                data-scrollax-parent="true">
                <div class="one-third order-md-last img js-fullheight"
                    style="background-image:url({{asset('template/images/home.jpg')}});">
                    <h3 class="vr">Camera de Surveillance</h3>
                </div>
                <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                    data-scrollax=" properties: { translateY: '70%' }">
                    <div class="text">
                        <h1 class="mb-4">Direct-Vision <br></h1>
                        <p>
                        <h3>alarme, interphonie et vidéosurveillance à Saint-Denis</h3>
                        </p>
                        <p>
                        <h6></h6>
                        </p>
                        <p><a href="{{route('contact-us')}}" class="btn btn-primary px-4 py-3 mt-3">Contactez-Nous</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item js-fullheight">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                data-scrollax-parent="true">
                <div class="one-third order-md-last img js-fullheight"
                    style="background-image:url({{asset('template/images/carrousel-video-phonie.jpg')}});">
                    <h3 class="vr">DIRECT-VISION</h3>
                </div>
                <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                    data-scrollax=" properties: { translateY: '70%' }">
                    <div class="text">
                        <h1 class="mb-4">vidéophonie <br></h1>
                        <p>
                        <h3>Les meilleures solutions de vidéophonie à Saint-Denis</h3>
                        </p>
                        <p>
                        <h6></h6>
                        </p>
                        <p><a href="{{route('contact-us')}}" class="btn btn-primary px-4 py-3 mt-3">Contactez-Nous</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item js-fullheight">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                data-scrollax-parent="true">
                <div class="one-third order-md-last img js-fullheight"
                    style="background-image:url({{asset('template/images/home-1.jpg')}});">
                    <h3 class="vr">Equipement de Surveillance et Sécurité</h3>
                </div>
                <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                    data-scrollax=" properties: { translateY: '70%' }">
                    <div class="text">
                        <h1 class="mb-4">Installation</h1>
                        <p>
                        <h3>Remplacez alors votre sonnette par un interphone.</h3>
                        </p>
                        <p><a href="{{route('contact-us')}}" class="btn btn-primary px-4 py-3 mt-3">Contactez-Nous</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftc-no-pb">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2"
                style="background-image: url({{asset('template/images/home-about.jpg')}});">
            </div>
            <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section mb-5 pl-md-5">
                    <div class="pl-md-5 ml-md-5">
                        <span class="subheading subheading-with-line"><small
                                class="pr-2 bg-white">Présentation</small></span>
                        <h2 class="mb-4">Les spécialistes de l'installation des équipements de surveillance</h2>
                    </div>
                </div>
                <div class="pl-md-5 ml-md-5 mb-5">
                    <p>L'entreprise DIRECT-VISION est spécialisée dans l'installation des caméras de surveillance ainsi
                        que d'autres
                        équipements de protection des domiciles.
                        Installés à Saint-Denis, nos installeurs d'alarmes interviennent dans tout le département de
                        l'Île-de-France.</strong></p>
                    <p>
                        Nous sommes très attachée aux valeurs qui font notre renommée, à savoir : le sérieux, la
                        qualité et la réactivité..</p>
                    <p><a href="{{route('contact-us')}}" class="btn-custom">Faites-vous accompagner <span
                                class="ion-ios-arrow-forward"></span></a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-counter img" id="section-counter"
    style="background-image: url({{asset('template/images/bg_3.png')}});" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row d-md-flex align-items-center justify-content-end">
            <div class="col-lg-10">
                <div class="row d-md-flex align-items-center">
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="10">0</strong>
                                <span>Années d'expérience</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="351">0</strong>
                                <span>Clients satisfaits</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="564">0</strong>
                                <span>Projets achevés</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-2">
            <div class="col-md-4 heading-section ftco-animate">
                <span class="subheading subheading-with-line"><small class="pr-2 bg-white">Activité
                        Récente</small></span>
                <h2 class="mb-4">Projets réaliser récement</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($projets as $projet)
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry">
                    <a href="{{route('projects.show',$projet->id)}}" class="block-20"
                        style="background-image: url('{{asset(json_decode($projet->img_url)[0])}}');">
                    </a>
                    <div class="text d-flex py-4">
                        <div class="meta mb-3">
                            <div><a href="#">{{Carbon\Carbon::create($projet->created_at)->diffForHumans()}}</a></div>
                            <div><a href="{{route('service.'.strtolower($projet->service))}}">{{$projet->service}}</a>
                            </div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span>
                                    {{$projet->comment->count()}}</a></div>
                        </div>
                        <div class="desc pl-3">
                            <h3 class="heading"><a
                                    href="{{route('projects.show',$projet->id)}}">{{Str::of($projet->title)->limit(50)}}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading subheading-with-line"><small class="pr-2 bg-light">Témoignage</small></span>
                <h2 class="mb-4">Avis de quelque clients statisfait</h2>
                <p>Nous plaçons la satisfaction client au centre de notre métier.
                    Au delà des mots, nous nous attachons à vérifier, pour chaque intervention, les résultats concrets
                    générés et l’avis de
                    nos clients. C’est ce que nous dicte notre ADN. Découvrez ci-dessous ce que disent nos clients de
                    nos interventions à
                    leurs côtés.</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5"
                                style="background-image: url({{asset('template/images/user.png')}})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Un grand merci a Direct-Vision pour la compétence, leurs
                                    professionnalismes, leurs originalité, et surtout la rapidité
                                    à installer mes cameras. Je vous le conseille vivement.
                                    !</p>
                                <div class="pl-5">
                                    <p class="name">Jean-Luc</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5"
                                style="background-image: url({{asset('template/images/user.png')}})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Très satisfait de vos services. Simplicité efficacité et
                                    réactivité !!! merci encore.</p>
                                <div class="pl-5">
                                    <p class="name">Meyer Philipe</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5"
                                style="background-image: url({{asset('template/images/user.png')}})">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Prestations de très hautes qualités, conseils judicieux,
                                    approche commerciale personnalisée, réalisation très
                                    professionnelle, et enfin des tarifs très compétitifs. Je conseille ce prestataire
                                    pour tout projet d'installation d'équipement de surveillance de domicile ou bureau. Du
                                    sur-mesure comme nous avons besoin dans une société où tout est standardisé !</p>
                                <div class="pl-5">
                                    <p class="name">Guillaume DAUDU</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-client">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-2">
            <div class="col-md-4 heading-section ftco-animate">
                <span class="subheading subheading-with-line"><small class="pr-2 bg-white">Partenaire</small></span>
                <h2 class="mb-4">Nous collaborons avec de grandes marques de télésurveillance</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-client owl-carousel">
                    <div class="item">
                        <a href="#" class="client text-center p-5">
                            <img src="{{asset('template/images/partner-1.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="client text-center p-5">
                            <img src="{{asset('template/images/partner-2.png')}}" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="client text-center p-5">
                            <img src="{{asset('template/images/partner-3.png')}}" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="client text-center p-5">
                            <img src="{{asset('template/images/partner-4.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection