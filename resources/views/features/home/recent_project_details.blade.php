@extends("layouts.home",["title" => "Detail projet | ".env('APP_NAME')])
@push("css")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endpush
@section("content")
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Detail Projet</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil <i
                                class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a
                            href="index.html">Projet Récent <i class="ion-ios-arrow-forward"></i></a></span> <span>
                        {{$projet->title}} <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <p>
                    {{-- <img src="{{asset('template/images/image_1.jpg')}}" alt="" class="img-fluid"> --}}
                    {{-- {{asset(json_decode($projet->img_url)[0])}} --}}
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @for ($i = 0; $i < sizeof(json_decode($projet->img_url)); $i++)
                            <div class="swiper-slide"><img src="{{asset(json_decode($projet->img_url)[$i])}}" alt=""
                                    class="img-fluid"></div>
                            @endfor
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
                </p>
                <h2 class="mb-3">{{$projet->title}}</h2>
                <p>{{$projet->description}}</p>
                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        <a href="{{route('service.videophone')}}" class="tag-cloud-link">Vidéophonie</a>
                        <a href="{{route('service.alarme')}}" class="tag-cloud-link">Alarme</a>
                        <a href="{{route('service.interphone')}}" class="tag-cloud-link">Interphonie</a>
                    </div>
                </div>
                <div class="pt-5 mt-5">
                    <h3 class="mb-5 h4 font-weight-bold"> 3 Derniers Commentaire</h3>
                    @foreach ($projet->comment as $comment)
                    @if($loop->index <= 2) <ul class="comment-list">
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="{{asset('template/images/user.png')}}" alt="Image">
                            </div>
                            <div class="comment-body">
                                <h3>{{$comment->user}}</h3>
                                <div class="meta mb-2">{{Carbon\Carbon::create($comment->created_at)->diffForHumans()}}
                                </div>
                                <p>{{$comment->comment}}</p>
                            </div>
                        </li>
                        </ul>
                        @endif
                        @endforeach
                        <!-- END comment-list -->
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5 h4 font-weight-bold">Laissez un commentaire</h3>
                            <form method="POST" action="{{route('comments.store')}}" class="p-5 bg-light">
                                @csrf
                                <input type="hidden" name="projet_id" value="{{$projet->id}}" required>
                                <div class="form-group">
                                    <label for="user">Nom *</label>
                                    <input name="user" type="text"
                                        class="form-control @error('user') is-invalid @enderror" id="user" required>
                                    @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message">Commentaire *</label>
                                    <textarea name="comment" required cols="30" rows="5"
                                        class="form-control @error('comment') is-invalid @enderror"></textarea>
                                    @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Poster Votre Commentaire"
                                        class="btn py-3 px-4 btn-primary">
                                </div>
                            </form>
                        </div>
                </div>
            </div> <!-- .col-md-8 -->

            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3>Réalisations</h3>
                    <ul class="categories">
                        <li><a href="{{route('ours.projects')}}">Nos réalisations</a></li>
                    </ul>
                </div>
            </div><!-- END COL -->
        </div>
    </div>
</section>
@endsection
@push("js")
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    $(()=>{
        const swiper = new Swiper('.swiper', {
            init: true,
            direction: 'horizontal',
            touchEventsTarget: 'container',
            effect: 'fade',
            pagination:{
                el: '.swiper-pagination',
            },
            scrollbar:{
                el: '.swiper-scrollbar',
            }
        })
    })
</script>
@endpush