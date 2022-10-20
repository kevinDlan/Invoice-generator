<form id="update-form" method="POST" action="" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-floating mb-3 col-md-12 col-lg-12 ogin">
        <input name="title" value="{{ old('title') }}" type="text"
            class="form-control @error('title') is-invalid @enderror" id="title" placeholder="" required>
        <label for="floatingInput">Titre du projet</label>
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="form-floating mb-3 col-md-12 col-lg-12">
        <select id="service" name="service" class="form-select mb-3 @error('service') is-invalid @enderror"
            aria-label="service" aria-placeholder="" required>
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
    <div class="form-floating mb-3 col-md-12 col-lg-12">
        <textarea id="description" name="description" required
            class="form-control @error('description') is-invalid @enderror" placeholder="Description du projet"
            id="floatingTextarea" style="height: 150px;">{{ old('description') }}</textarea>
        <label for="floatingTextarea">Description</label>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3 col-md-12 col-lg-12">
        <label for="formFileMultiple">Ajouter des Photos</label>
        <input name="images[]" class="form-control" type="file" accept=".png,.jpeg,.jpg"
            id="formFileMultiple" multiple>
        @error('images')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div id="preview" class="row mb-3">

    </div>
    <div class="text-center mt-5">
        <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Enregistrer</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-xmark"></i>Annuler</button>
    </div>
</form>