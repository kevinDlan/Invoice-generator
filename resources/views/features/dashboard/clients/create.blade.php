@extends("layouts.app",["title" => "Ajout Client | ".env('APP_NAME')])
@section("content")
<!-- content -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Enregistrement client</h6>
            <a class="btn btn-primary" href="{{route('clients.index')}}"><i class="bi bi-person-lines-fill"></i> Liste des clients</a>
        </div>
        <div class="create-form">
            <form method="POST" action="{{route('clients.store')}}">
                @csrf
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="last_name" value="{{ old('last_name') }}" type="text"
                        class="form-control @error('last_name') is-invalid @enderror" id="floatingInput"
                        placeholder="nom du client" required>
                    <label for="floatingInput">Nom <span class="text-danger">*</span></label>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="first_name" value="{{ old('first_name') }}" type="text"
                        class="form-control @error('first_name') is-invalid @enderror" id="floatingInput"
                        placeholder="prénom du client" required>
                    <label for="floatingInput">Prénom <span class="text-danger">*</span></label>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="address" value="{{ old('address') }}" type="text"
                        class="form-control @error('address') is-invalid @enderror" id="floatingInput"
                        placeholder="Adresse">
                    <label for="floatingInput">Adresse</label>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="contact" value="{{ old('contact') }}" type="text"
                        class="form-control @error('contact') is-invalid @enderror" id="floatingInput"
                        placeholder="contact" required>
                    <label for="floatingInput">Contact <span class="text-danger">*</span></label>
                    @error('contact')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="email" value="{{ old('email') }}" type="text"
                        class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                        placeholder="nom du client" required>
                    <label for="floatingInput">Email <span class="text-danger">*</span></label>
                    @error('email')
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