@extends('layouts.home', ['title'=>'Services | '.env("APP_NAME")])
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('template/images/about-bg.jpg')}})"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Les services proposés par vos installateurs d'alarmes</h1>
                <p style="color: white">À votre service depuis l'année 2000 !</p>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Acceuil <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>A propos de nous <i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-2">
            <div class="col-md-4 heading-section ftco-animate">
                <span class="subheading subheading-with-line"><small class="pr-2 bg-white">Nos Services</small></span>
                <h2 class="mb-4">Présentation des services</h2>
            </div>
        </div>
    </div>
    <div class="container-wrap text-center mb-5">
        <div class="row">
            <div class="col-md-6 col-lg-3"></div>
            <a href="{{route('service.videophone')}}">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="project">
                        <img src="{{asset('template/images/videophonie_service.jpg')}}" class="img-fluid" alt="videophonie">
                        <div class="text">
                            <span>Vidéophonie</span>
                            <h3>Vidéosurveillance</h3>
                        </div>
                        <a class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-expand"></span>
                        </a>
                    </div>
                </div>
            </a>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <a href="{{route('service.alarme')}}">
                <div class="project">
                    <img style="object-fit:fill" src="{{asset('template/images/alarmes-service.jpg')}}" class="img-fluid" alt="Colorlib Template">
                    <div class="text">
                        <span>Alarmes</span>
                        <h3>Installation</h3>
                    </div>
                    <a
                        class="icon d-flex justify-content-center align-items-center">
                        <span class="icon-expand"></span>
                    </a>
                </div>
            </a>
            </div>
            <div class="col-md-6 col-lg-3"></div>
            <div class="col-md-6 col-lg-3"></div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <a href="{{route('service.interphone')}}">
                <div class="project">
                    <img src="{{asset('template/images/interphone-service.jpg')}}" class="img-fluid" alt="Colorlib Template">
                    <div class="text">
                        <span>Pose</span>
                        <h3>Interphonie</h3>
                    </div>
                    <a
                        class="icon d-flex justify-content-center align-items-center">
                        <span class="icon-expand"></span>
                    </a>
                </div>
            </a>
            </div>
            {{-- <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="project">
                    <img src="{{asset('template/images/work-5.jpg')}}" class="img-fluid" alt="Colorlib Template">
                    <div class="text">
                        <span>Landscape Design</span>
                        <h3>Office Interior Design</h3>
                    </div>
                    <a href="{{asset('template/images/work-5.jpg')}}"
                        class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="icon-expand"></span>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection