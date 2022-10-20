@extends('layouts.home',['title'=>'A-propos | '.env("APP_NAME")])
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
                                    class="ion-ios-arrow-forward"></i></a></span> <span>A propos de nous <i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-5 p-md-5 img img-2" style="background-image: url({{asset('template/images/about-1.jpg')}})">
                </div>
                <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section mb-5 pl-md-5">
                        <div class="pl-md-5 ml-md-5">
                            <span class="subheading subheading-with-line"><small class="pr-2 bg-white">A propos</small></span>
                            <h2 class="mb-4">Confiez-nous la protection de votre maison à Paris</h2>
                        </div>
                    </div>
                    <div class="pl-md-5 ml-md-5 mb-5">
                        <p>Créée en 2000, l'entreprise DIRECT-VISION propose ses services pour améliorer la sécurité des maisons, appartements,
                        sociétés, locaux commerciaux, etc. Elle met au service de ses clients une expérience de plus de 10 ans dans le domaine
                        de l'installation des équipements de sécurité !
                        Nous sommes très attachée aux valeurs qui font notre renommée, à savoir : 
                        <ul>
                            <li>le sérieux</li>
                            <li>la qualité</li>
                            <li>et la réactivité.</li>
                        </ul>
                    </p>
                        {{-- <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline
                            of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own
                            road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way. --}}
                        </p>
                        {{-- <p><a href="#" class="btn-custom">Learn More <span class="ion-ios-arrow-forward"></span></a></p> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="row mt-5 pt-4">
                <div class="col-md-4 ftco-animate">
                    <h3 class="h4">Mission</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                        paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                </div>
                <div class="col-md-4 ftco-animate">
                    <h3 class="h4">Vission</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                        paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                </div>
                <div class="col-md-4 ftco-animate">
                    <h3 class="h4">Mosaic</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                        paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                </div>
            </div> --}}
        </div>
    </section>
@endsection