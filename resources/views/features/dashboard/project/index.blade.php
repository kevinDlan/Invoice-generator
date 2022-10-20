@extends("layouts.app",["title" => "Liste des projets | ".env('APP_NAME')])
@section("content")
<!-- project list -->
<div class="container-fluid pt-4 px-4">
    @livewire('project-list')
    @include("partials._action-modal")
    <div style="display: none">
        @include("partials._project-form")
    </div>
    <div style="display: none">
        @include("partials._delete-question")
    </div>
</div>
<!-- Project End -->
@endsection
@push("js")
<script>
    $('#formFileMultiple').on('change', (e) =>
        {
            $('#preview').empty();
            if(e.target.files.length > 0)
            {
                for(let i = 0; i < e.target.files.length; i++ )
                {
                    $('#preview').append(`<div class="col-md-6 col-lg-3"><img src="${URL.createObjectURL(e.target.files[i])}" style="width:110px; height:110px"></div>`)
                }
            }
        })
</script>
@endpush
@include("partials._toast-message")
@push("js")
<script src="https://kit.fontawesome.com/a52c0171ad.js" crossorigin="anonymous"></script>
@endpush