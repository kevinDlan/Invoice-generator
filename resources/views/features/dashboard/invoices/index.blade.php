@extends("layouts.app",["title" => "Liste de Factures | ".env('APP_NAME')])
@section("content")
<!-- project list -->
<div class="container-fluid pt-4 px-4">
    @livewire("invoice-list")
    @include("partials._action-modal")
    <div style="display: none">
        @include("partials._delete-question")
    </div>
</div>
<!-- Project End -->
@endsection
@include("partials._toast-message")
@push("js")
<script src="https://kit.fontawesome.com/a52c0171ad.js" crossorigin="anonymous"></script>
@endpush