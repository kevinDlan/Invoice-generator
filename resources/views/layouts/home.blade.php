<!DOCTYPE html>
<html lang="fr">

<head>
    <title>
        @isset($title)
        {{$title}}
        @else
        Direct-Vision | Acceuil
        @endisset
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
    @stack("css")
    @include("partials._favicon")
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><img width="70px"
                    src="{{asset('template/images/logo.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{Route::currentRouteName() === 'home' ? 'active' : '' }}"><a
                            href="{{route('home')}}" class="nav-link">Acceuil</a></li>
                    <li class="nav-item {{Route::currentRouteName() === 'about-us' ? 'active' : '' }}"><a
                            href="{{route('about-us')}}" class="nav-link">A propos</a></li>
                    <li class="nav-item {{Route::currentRouteName() === 'ours.projects' ? 'active' : '' }}"><a
                            href="{{route('ours.projects')}}" class="nav-link">Projets</a></li>
                    <li
                        class="nav-item {{in_array(Route::currentRouteName(),['services', 'service.alarme', 'service.videophone', 'service.interphone']) ? 'active' : '' }}">
                        <a href="{{route('services')}}" class="nav-link">Services</a></li>
                    {{-- <li class="nav-item"><a href="team.html" class="nav-link">Team</a></li> --}}
                    {{-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> --}}
                    <li class="nav-item {{Route::currentRouteName() === 'contact-us' ? 'active' : '' }}"><a
                            href="{{route('contact-us')}}" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')
    <!-- loader -->
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="{{route('home')}}"><img width="100px"
                                    src="{{asset('template/images/logo_blanc.png')}}" alt=""></a></h2>
                        <p>Notre entreprise de sécurité est au service de vos demandes à Paris</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Liens</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{route('home')}}"><span class="icon-long-arrow-right mr-2"></span>Acceuil</a>
                            </li>
                            <li><a href="{{route('about-us')}}"><span class="icon-long-arrow-right mr-2"></span>A
                                    propos</a></li>
                            <li><a href="{{route('services')}}"><span
                                        class="icon-long-arrow-right mr-2"></span>Services</a></li>
                            <li><a href="{{route('ours.projects')}}"><span
                                        class="icon-long-arrow-right mr-2"></span>Projets</a></li>
                            <li><a href="{{route('contact-us')}}"><span
                                        class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Services</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{route('service.videophone')}}"><span
                                        class="icon-long-arrow-right mr-2"></span>Videophonie</a>
                            </li>
                            <li><a href="{{route('service.alarme')}}"><span
                                        class="icon-long-arrow-right mr-2"></span>Alarme</a></li>
                            <li><a href="{{route('service.interphone')}}"><span
                                        class="icon-long-arrow-right mr-2"></span>Interphonie</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Newsletter</h2>
                        <p>Inscrisvez vous a notre newsletter, pour recevoir toute nos offre de publicité.</p>
                        <form method="POST" action="{{route('newletter.store')}}" class="subscribe-form">
                            @csrf
                            <div class="form-group">
                                <input name="email" type="text" class="form-control mb-2 text-center"
                                    placeholder="Entrez votre adresse e-mail" required>
                                <input type="submit" value="S'abonné" class="form-control submit px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Tous droits réservés
                        <a href="{{route('home')}}"><strong>Direct-Vision</strong></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg>
    </div>


    <script src="{{asset('template/js/jquery.min.js')}}"></script>
    <script src="{{asset('template/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('template/js/popper.min.js')}}"></script>
    <script src="{{asset('template/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('template/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('template/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('template/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('template/js/aos.js')}}"></script>
    <script src="{{asset('template/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('template/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('template/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('template/js/scrollax.min.js')}}"></script>
    <script src="{{asset('template/js/main.js')}}"></script>
    @if(session('msg'))
    {{-- Toast --}}
    <script src="{{asset('toast/dist/js/toast.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('toast/main.js')}}"></script>
    <script>
        successToast("Opération éffectué avec succès !");
    </script>
    @endif
    @error('email')
    <script src="{{asset('toast/dist/js/toast.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('toast/main.js')}}"></script>
        <script>
            errorToast("Vous êtes déjà inscrit !");
        </script>
    @enderror
    @stack("js")
</body>

</html>