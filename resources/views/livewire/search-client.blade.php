<div class="bg-light text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0"><i class="bi bi-person-lines-fill"></i> Liste des Clients</h6>
        <select wire:model.lazy="perPage" class="custom-select w-auto" name="show" id="per_page">
            @for ($i = 5; $i < 25; $i+=5)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
        <input wire:model='query' class="form-control w-auto" placeholder="Chercher" type="search">
        <a class="btn btn-primary" href="{{route('clients.create')}}"><i class="bi bi-plus-circle-fill"></i> Ajouter un
            client</a>
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>

                <tr class="text-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Nom Et Prénom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    {{-- <th scope="col">Amount</th> --}}
                    {{-- <th scope="col">Status</th> --}}
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{strtoupper($client->last_name)}} {{$client->first_name}}</td>
                    <td>{{$client->address}}</td>
                    <td>{{$client->contact}}</td>
                    <td>{{$client->email}}</td>
                    <td>
                        <div class="form-group my-auto">
                            <a data-id="{{$client->id}}" class="btn btn-sm btn-primary update" href=""><i
                                    class="fa fa-edit text-white"></i></a>
                            <a data-id="{{$client->id}}" class="btn btn-sm btn-danger delete" href=""><i
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
                    {{$clients->links()}}
                </div>
            </div>
        </div>
    </div>
</div>