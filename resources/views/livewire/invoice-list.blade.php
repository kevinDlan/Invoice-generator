<div class="bg-light text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0"><i class="bi bi-receipt-cutoff"></i> Liste des Factures</h6>
        <select wire:model.lazy="perPage" class="custom-select w-auto" name="show" id="per_page">
            @for ($i = 5; $i < 25; $i+=5) <option value="{{$i}}">{{$i}}</option>
                @endfor
        </select>
        <input wire:model='query' class="form-control w-auto" placeholder="Chercher" type="search">
        <a class="btn btn-primary" href="{{route('invoices.create')}}"><i class="bi bi-plus-circle-fill"></i> Créer
            une facture</a>
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-dark">
                    <th scope="col">N°</th>
                    <th scope="col">Numéro facture</th>
                    <th scope="col">Date émission</th>
                    <th scope="col">Client</th>
                    <th scope="col">Montant Total</th>
                    <th scope="col">Montant Payé</th>
                    <th scope="col">Montant Due</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$invoice->invoice_no}}</td>
                    <td>{{Carbon\Carbon::create($invoice->created_at)->format("d-m-Y H:m:s")}}</td>
                    <td>{{$invoice->client->first_name." ".$invoice->client->last_name}}</td>
                    <td>{{number_format($invoice->total_amount,0,null,' ')}} €</td>
                    <td>{{number_format($invoice->paid_amount,0,null,' ')}} €</td>
                    <td>{{number_format($invoice->due_amount,0,null,' ')}} €</td>
                    <td>
                        <div class="form-group my-auto">
                            <a class="btn btn-sm btn-primary preview" href="{{route('invoices.show',$invoice->id)}}"><i
                                    class="bi bi-eye-fill"></i></a>
                            <a class="btn btn-sm btn-primary edit" href="{{route('invoices.edit',$invoice->id)}}"><i
                                    class="fa fa-edit text-white"></i></a>
                            <a data-id="{{$invoice->id}}" class="btn btn-sm btn-danger delete-invoice" href=""><i
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
                    {{$invoices->links()}}
                </div>
            </div>
        </div>
    </div>
</div>