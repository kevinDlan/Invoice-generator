@extends('layouts.home',['title'=>'Contactez-nous |'.env("APP_NAME")])
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('template/images/contact-bg.jpg')}});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Contactez DIRECT-VISION pour l'installation de votre alarme à Saint-Denis</h1>
                <p style="color: white">Nous sommes toujours disponibles pour répondre à vos demandes !</p>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil<i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h4">Informations de contact</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3">
                <i class="flaticon-address"></i>
                <p><span>Adresse:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
            </div>
            <div class="col-md-3">

                <p><span>Téléphone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
            </div>
            <div class="col-md-3">
                <p><span>Email:</span> <a href="mailto:conatct@direct-vision.com">contact@direct-vision.com</a></p>
            </div>
            <div class="col-md-3">
                <p><span>Site web</span> <a href="#">direct-vision.com</a></p>
            </div>
            <div class="col-md-3">
                <p><span>Horaire</span></p>
                <div class="row">
                    <div class="col-md-6 col-lg-6">Lun - Ven</div>
                    <div class="col-md-6 col-lg-6">08:00 - 18:00</div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6">Sam - Dim</div>
                    <div class="col-md-6 col-lg-6 text-danger">Fermé</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container-wrap">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 p-5 order-md-last">
                <form method="POST" action="{{route('contacts.store')}}">
                    @csrf
                    <div class="form-group">
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Votre nom *" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control @error('name') is-invalid @enderror" placeholder="Votre adresse email *" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input name="subject" type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Sujet *">
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="5" class="form-control"
                            placeholder="Message *" minlength="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Envoyer" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>
@endsection
@push("js")
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
        </script>
    <script src="{{asset('template/js/google-map.js')}}"></script>
@endpush