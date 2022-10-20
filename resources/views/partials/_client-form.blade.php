<form id="update-form" method="POST" action="">
    @csrf
    {{method_field('PUT')}}
    <div class="form-floating mb-2 col-md-12 col-lg-12 ogin">
        <input name="last_name" value="{{ old('last_name') }}" type="text"
            class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="nom du client"
            required>
        <label for="floatingInput">Nom <span class="text-danger">*</span></label>
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="form-floating mb-2 col-md-12 col-lg-12 ogin">
        <input name="first_name" value="{{ old('first_name') }}" type="text"
            class="form-control @error('first_name') is-invalid @enderror" id="first_name"
            placeholder="prénom du client" required>
        <label for="floatingInput">Prénom <span class="text-danger">*</span></label>
        @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="form-floating mb-2 col-md-12 col-lg-12 ogin">
        <input name="address" value="{{ old('address') }}" type="text"
            class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Adresse">
        <label for="floatingInput">Adresse</label>
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="form-floating mb-2 col-md-12 col-lg-12 ogin">
        <input name="contact" maxlength="10" value="{{ old('contact') }}" type="text"
            class="form-control @error('contact') is-invalid @enderror" id="contact" placeholder="contact" required>
        <label for="floatingInput">Contact <span class="text-danger">*</span></label>
        @error('contact')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="form-floating mb-2 col-md-12 col-lg-12 ogin">
        <input name="email" value="{{ old('email') }}" type="text"
            class="form-control @error('email') is-invalid @enderror" id="email" placeholder="" required>
        <label for="floatingInput">Email <span class="text-danger">*</span></label>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    
    <div class="text-center mt-5">
        <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Enregistrer</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i>Annuler</button>
    </div>
</form>