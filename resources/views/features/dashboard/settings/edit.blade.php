@extends("layouts.app",['title'=>"Mes paramètre | ".env("APP_NAME")])
@section("content")
<!-- content -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0"> <i class="bi bi-gear-fill"></i> Paramètre</h6>
        </div>
        <div class="create-form">
            <form method="POST" action="{{route("settings.update",$setting->id)}}">
                @method("PUT")
                @csrf
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input value="{{$setting->compagny_name}}" name="compagny_name" type="text"
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
                    <input value="{{$setting->compagny_address}}" name="compagny_address" type="text"
                        class="form-control @error('compagny_address') is-invalid @enderror" id="floatingInput"
                        placeholder="prénom du client" required>
                    <label for="floatingInput">adresse <span class="text-danger">*</span></label>
                    @error('compagny_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input value="{{$setting->phone}}" name="phone" type="text"
                        class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="phone">
                    <label for="floatingInput">Telephone</label>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-md-6 col-lg-6ogin">
                    <input name="email" value="{{$setting->vat}}" type="text"
                        class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="email"
                        required>
                    <label for="floatingInput">email <span class="text-danger">*</span></label>
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