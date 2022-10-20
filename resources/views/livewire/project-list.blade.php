<div class="bg-light text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0"><i class="bi bi-card-checklist"></i> Liste des Projets Récent</h6>
        <select wire:model.lazy="perPage" class="custom-select w-auto" name="show" id="per_page">
            @for ($i = 5; $i < 25; $i+=5) <option value="{{$i}}">{{$i}}</option>
                @endfor
        </select>
        <input wire:model='query' class="form-control w-auto" placeholder="Chercher" type="search">
        <a class="btn btn-primary" href="{{route('projects.create')}}"><i class="bi bi-plus-circle-fill"></i>
            Ajouter un projet</a>
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>

                <tr class="text-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Service</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projets as $project)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$project->title}}</td>
                    <td><img width="150px" height="150px" src="{{asset(json_decode($project->img_url)[0])}}"
                            alt="image"></td>
                    <td>{{$project->service}}</td>
                    <td>{{Str::of($project->description)->limit(100)}}</td>
                    <td>
                        <div class="form-group my-auto">
                            <a data-id="{{$project->id}}" class="btn btn-sm btn-primary edit-project" href=""><i
                                    class="fa fa-edit text-white"></i></a>
                            <a data-id="{{$project->id}}" class="btn btn-sm btn-danger delete-project" href=""><i
                                    class="fa fa-trash text-white"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row no-gutters mt-5">
            <div class="col text-center">
                <div class="d-flex justify-content-center">
                    {{$projets->links()}}
                </div>
            </div>
        </div>
    </div>
</div>