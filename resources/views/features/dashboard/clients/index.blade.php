@extends("layouts.app",["title" => "Liste Clients | ".env('APP_NAME')])
@section("content")
<!-- list -->
<div class="container-fluid pt-4 px-4">
    @livewire("search-client")
    @include("partials._action-modal")
    <div style="display: none">
        @include('partials._client-form')
    </div>
    <div style="display: none">
        @include("partials._delete-question")
    </div>
</div>
<!-- End -->
@endsection
@include("partials._toast-message")
@push("js")
<script src="https://kit.fontawesome.com/a52c0171ad.js" crossorigin="anonymous"></script>
@endpush