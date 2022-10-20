@extends("layouts.app",["title" => "Ajout de Projet | ".env('APP_NAME')])
@section("content")
<!-- project list -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Ajout de projet</h6>
            <a class="btn btn-primary" href="{{route('projects.index')}}"><i class="bi bi-card-checklist"></i> Liste des projets</a>
        </div>
        <div class="create-form">
            <form method="POST" action="{{route('projects.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="title" value="{{ old('title') }}" type="text"
                        class="form-control @error('title') is-invalid @enderror" id="floatingInput" placeholder=""
                        required>
                    <label for="floatingInput">Titre du projet</label>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6">
                    <select name="service" class="form-select mb-3 @error('service') is-invalid @enderror"
                        aria-label="service" aria-placeholder="" required>
                        <option disabled>Service du projet</option>
                        <option value="videophone">Vidéophonie</option>
                        <option value="alarme">Arlame</option>
                        <option value="interphone">Interphonie</option>
                    </select>
                    @error('service')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6">
                    <textarea name="description" required
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Description du projet" id="floatingTextarea"
                        style="height: 150px;">{{ old('description') }}</textarea>
                    <label for="floatingTextarea">Description</label>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-lg-6">
                    <label for="formFileMultiple">Ajouter des Photos</label>
                    <input name="images[]" class="form-control" type="file" accept=".png,.jpeg,.jpg" id="formFileMultiple"
                        multiple required>
                    @error('images')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div id="preview" class="row mb-3">

                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
<!-- Project End -->
@endsection
{{-- js script --}}
@push("js")
<script>
    $('#formFileMultiple').on('change', (e) =>
        {
            $('#preview').empty();
            if(e.target.files.length > 0)
            {
                for(let i = 0; i < e.target.files.length; i++ )
                {
                    $('#preview').append(`<div class="col-md-6 col-lg-3"><img src="${URL.createObjectURL(e.target.files[i])}" style="width:200px; height:200px"></div>`)
                }
            }
        })
</script>
@endpush