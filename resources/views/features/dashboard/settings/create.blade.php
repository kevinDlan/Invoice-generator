@extends("layouts.app",['title'=>"paramètre | ".env("APP_NAME")])
@section("content")
<!-- content -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0"> <i class="bi bi-gear-fill"></i> Paramètre</h6>
            <a class="btn btn-primary" href="{{route("settings.index")}}">Mes Paramètres</a>
        </div>
        <div class="create-form">
            <form method="POST" action="{{route("settings.store")}}">
                @csrf
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="compagny_name" value="{{ old('compagny_name') }}" type="text"
                        class="form-control @error('compagny_name') is-invalid @enderror" id="floatingInput"
                        placeholder="nom du client" required>
                    <label for="floatingInput">Nom de l'entreprise <span class="text-danger">*</span></label>
                    @error('compagny_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="compagny_address" value="{{ old('compagny_address') }}" type="text"
                        class="form-control @error('compagny_address') is-invalid @enderror" id="floatingInput"
                        placeholder="prénom du client" required>
                    <label for="floatingInput">Code <span class="text-danger">*</span></label>
                    @error('compagny_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="code" value="{{ old('code') }}" type="text"
                        class="form-control @error('code') is-invalid @enderror" id="floatingInput"
                        placeholder="code">
                    <label for="floatingInput">Adresse</label>
                    @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="vat" value="{{ old('vat') }}" type="text"
                        class="form-control @error('vat') is-invalid @enderror" id="floatingInput"
                        placeholder="vat" required>
                    <label for="floatingInput">Contact <span class="text-danger">*</span></label>
                    @error('vat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
<!-- End -->
@endsection