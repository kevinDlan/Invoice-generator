@extends("layouts.home", ['title'=>'Projects Réalisé | '.env("APP_NAME")])
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('template/images/home-1.jpg')}});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Les spécialistes de l'installation des équipements de surveillance</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil <i
                                class="ion-ios-arrow-forward"></i></a></span> <span> Projets <i
                            class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-2">
            <div class="col-md-4 heading-section ftco-animate">
                <span class="subheading subheading-with-line"><small class="pr-2 bg-white">Nos Projets
                        réalisés</small></span>
                <h2 class="mb-4">Galerie de Réalisation</h2>
            </div>
        </div>
    </div>
    <div class="container-wrap">
        <div class="row no-gutters ml-1 mr-1">
            @foreach ($projets as $projet)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="project">
                    <img src="{{asset(json_decode($projet->img_url)[0])}}" class="img-fluid" alt="projet">
                    <div class="text">
                        <span>{{$projet->service}}</span>
                        <h3><a href="{{route('projects.show',$projet->id)}}">{{$projet->title}}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row no-gutters mt-5">
            <div class="col text-center">
                <div class="d-flex justify-content-center mt-5">
                    {{$projets->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push("js")
    <script src="https://kit.fontawesome.com/a52c0171ad.js" crossorigin="anonymous"></script>
@endpush