<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>404</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('template/dashboard/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/dashboard/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
        rel="stylesheet')}}" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('template/dashboard/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('template/dashboard/css/style.css')}}" rel="stylesheet">
    {{-- favicon --}}
    @include("partials._favicon")
    {{-- Toast --}}
    <link rel="stylesheet" href="{{asset('toast/dist/css/toast.min.css')}}">
</head>

<body>
    {{-- <div class="container-xxl position-relative bg-white d-flex p-0"> --}}
        <!-- Content Start -->
        <div class="container-fluid px-4">
            <!-- Spinner Start -->
            <div id="spinner"
                class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->
            <div class="row vh-100 rounded align-items-center justify-content-center mx-0">
                <div class="col-md-6 text-center p-4">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1 fw-bold">404</h1>
                    <h1 class="mb-4">Page non trouvée</h1>
                    <p class="mb-4">Nous sommes désolés, la page que vous avez recherchée n'existe pas sur notre site
                        web. Allez peut-être sur notre page
                        d'accueil ou essayez d'utiliser une recherche ?</p>
                    @auth
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('dashboard')}}">Retour à Tableau de
                        bord</a>
                    @else
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('home')}}">Retour à l'accueil</a>
                    @endauth
                </div>
            </div>
        </div>
        <!-- 404 End -->
        {{--
    </div> --}}
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('template/dashboard/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('template/dashboard/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('template/dashboard/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('template/dashboard/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
    <script src="{{asset('template/dashboard/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('template/dashboard/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('template/dashboard/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    {{-- Toast --}}
    <script src="{{asset('toast/dist/js/toast.min.js')}}" type="text/javascript"></script>
    <!-- Template Javascript -->
    <script src="{{asset('template/dashboard/js/main.js')}}"></script>
</body>

</html>