@extends("layouts.app",['title'=> 'Dashboard | '.env('APP_NAME')])
@section("content")
<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Client</p>
                    <h6 class="mb-0">{{$client}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-file fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Facture</p>
                    <h6 class="mb-0">{{$invoice}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Projet</p>
                    <h6 class="mb-0">{{$project}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-comment fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Commentaire</p>
                    <h6 class="mb-0">{{$comment}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-2"></div>
        <!-- Calender -->
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calendrier</h6>
                </div>
                <div id="calender"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-light rounded p-4">
                    @foreach ($recentComment as $comment)
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">Commentaires Récent</h6>
                        <a href="">Voir tout</a>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <img class="rounded-circle flex-shrink-0" src="{{asset('template/images/user.png')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">{{$comment->user}}</h6>
                                <small>{{Carbon\Carbon::create($comment->created_at)->diffForHumans()}}</small>
                            </div>
                            <span>{{Str::of($comment->comment)->limit(23)}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            
        </div>
        <div class="col-sm-12 col-md-6 col-xl-2">
        </div>
    </div>
</div>
<!-- Widgets End -->
@endsection