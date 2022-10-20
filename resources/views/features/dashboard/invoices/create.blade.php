@extends('layouts.app',['title'=>'Emission Facture | '.env('APP_NAME')])
@push("css")
<link rel="stylesheet" href="{{asset('template/dashboard/css/invoice.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="content-invoice">
            <div class="cards">
                <div class="card-bodys">
                    <form action="{{route("invoices.store")}}" id="invoice-form" method="POST" class="invoice-form"
                        role="form">
                        @csrf
                        <div class="load-animate animated fadeInUp">
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <h4 class="title">Facture N°<sup class="fs-6">10007</sup></h4>
                                    <input type="hidden" name="invoice_no" value="10007">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <select id="client_id" name="client_id" class="form-select @error('client_id') is-invalid @enderror"
                                                aria-label="client" aria-placeholder="" required>
                                                <option selected disabled>Veuillez selectionnez un client</option>
                                            </select>
                                            @error('client_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 my-auto">
                                            <a data-toggle="tooltip" data-placement="right" title="Ajouter un client"
                                                class="add-customer font-semibold" href=""><i
                                                    class="bi bi-plus-circle-fill fs-5"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <input id="currency" type="hidden" value="$"> --}}
                            <div class="row">
                                @include("partials._address",["invoice" => false])
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <h5>A,</h5>
                                    <div class="form-group mb-2">
                                        <input readonly type="text" class="form-control" name="customer" id="customer"
                                            placeholder="Nom client ou Entreprise" autocomplete="off">
                                    </div>
                                    <div class="form-group mb-2">
                                        <textarea readonly class="form-control" rows="3" name="address" id="address"
                                            placeholder="Adresse"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <table class="table table-condensed table-striped" id="invoiceItem">
                                        <tr>
                                            <th width="2%">
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll"
                                                        name="checkAll">
                                                    <label class="custom-control-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th width="10%">Ref</th>
                                            <th width="38%">Désignation</th>
                                            <th width="15%">Quantité</th>
                                            <th width="15%">Prix Unitaire</th>
                                            <th width="15%">Total</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="itemRow custom-control-input"
                                                        id="itemRow_1">
                                                    <label class="custom-control-label" for="itemRow_1"></label>
                                                </div>
                                            </td>
                                            <td><input type="text" name="productCode[]" id="productCode_1"
                                                    class="form-control" autocomplete="off" required></td>
                                            <td><input type="text" name="productName[]" id="productName_1"
                                                    class="form-control" autocomplete="off" required></td>
                                            <td><input type="number" name="quantity[]" id="quantity_1"
                                                    class="form-control quantity" autocomplete="off" required></td>
                                            <td><input type="number" name="price[]" id="price_1"
                                                    class="form-control price" autocomplete="off" required></td>
                                            <td><input readonly type="number" name="total[]" id="total_1"
                                                    class="form-control total" autocomplete="off" required></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-danger" id="removeRows" type="button"><i
                                            class="bi bi-x-circle-fill"></i>
                                        Supprimer</button>
                                    <button class="btn btn-success" id="addRows" type="button"><i
                                            class="bi bi-plus-circle-fill"></i> Ajouter</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group mt-3 mb-3 ">
                                        <label>Sous-Total: &nbsp;</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text currency">€</span>
                                            </div>
                                            <input step="0.01" value="" type="number" class="form-control" name="subTotal"
                                                id="subTotal" placeholder="Sous-Total">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group mt-3 mb-3 ">
                                        <label>TVA: &nbsp;</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text currency"><i
                                                        class="bi bi-percent"></i></span>
                                            </div>
                                            <input required step="0.01" value="" type="number" class="form-control" name="taxRate"
                                                id="taxRate" placeholder="TVA">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group mt-3 mb-3 ">
                                        <label>Montant de la taxe: &nbsp;</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text currency">€</span>
                                            </div>
                                            <input step="0.01" value="" type="number" class="form-control" name="taxAmount"
                                                id="taxAmount" placeholder="Montant taxe">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group mt-3 mb-3 ">
                                        <label>Total: &nbsp;</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">€</span>
                                            </div>
                                            <input step="0.01" readonly value="" type="number" class="form-control"
                                                name="totalAftertax" id="totalAftertax" placeholder="Total">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group mt-3 mb-3 ">
                                        <label>Montant payé: &nbsp;</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text currency">€</span>
                                            </div>
                                            <input step="0.01" value="" type="number" class="form-control" name="amountPaid"
                                                id="amountPaid" placeholder="Montant payé">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group mt-3 mb-3 ">
                                        <label>Somme due: &nbsp;</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text currency">€</span>
                                            </div>
                                            <input step="0.01" readonly value="" type="number" class="form-control" name="amountDue"
                                                id="amountDue" placeholder="Montant Due">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    {{-- <h3>Notes: </h3>
                                    <div class="form-group">
                                        <textarea class="form-control txt" rows="5" name="notes" id="notes"
                                            placeholder="Your Notes"></textarea>
                                    </div>
                                    <br> --}}
                                    <div class="form-group mt-4">
                                        {{-- <input type="hidden" value="test" class="form-control" name="userId">
                                        <input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn"
                                            value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
                                        --}}
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>
                                            Enregistrer</button>
                                        <button type="submit" formaction="{{route('invoice.store-send')}}" class="btn btn-primary"> <i class="fa fa-envelope"></i> Envoyer </button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include("partials._action-modal",['title'=>"Enregistrement d'un client"])
<div class="d-none">
    @include("partials._client-form")
</div>
@endsection
@push("js")
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<script src="{{asset('template/dashboard/js/invoice.js')}}"></script>
<script>
    // select all client
    $( async()=>{

        const fetchAllClient = async ()=>{
            try{
            const client = await fetch(`/clients?ajax=true`);
            const res = await client.json();
            return res;
            }catch(e)
            {
            console.log(e)
            }
            }

        const clients = await fetchAllClient();
            client = '';
            if(clients !== null){
            clients.map(c => client += `<option value="${c.id}">${c.first_name} ${c.last_name}</option>`);
            $("#client_id").append(client)
            }

        $("#client_id").on("change", (e)=>{
            const customerID = e.target.value
            const seletedCustomer = clients.find((c)=> c.id == customerID)

            $('#customer').val(`${seletedCustomer.first_name} ${seletedCustomer.last_name}`)
            let address = ''
            address += `${seletedCustomer.address}\n`
            address += `${seletedCustomer.contact}\n`
            address += `${seletedCustomer.email}`
            $('#address').html(address)
        })

        const form = $("#update-form");
        $(".add-customer").on("click", (e)=>{
            e.preventDefault();
            $("#updateModal").modal("show");
            setTimeout(() => {
                $("#loader").replaceWith(form);
            }, 1500);
        })
    })

    $.ajaxSetup(
        {
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        }
    )

    $('#update-form').submit((form)=>
    {
        form.preventDefault();
        const last_name = $("input[name='last_name'").val();
        const first_name = $("input[name='first_name'").val();
        const address = $("input[name='address'").val();
        const contact = $("input[name='contact'").val();
        const email = $("input[name='email'").val();

        alert(last_name);
        
        // process ajax request
        $.ajax({
            url:'{{route("clients.store")}}',
            type:'POST',
            dataType:'json',
            data:{
                last_name:last_name,
                first_name:first_name,
                address:address,
                contact:contact,
                email:email
             },
            success:(data)=>{ 
                if(data)
                {
                    console.log(data)
                    let newClient = `<option value=${data.id} selected>${data.first_name} ${data.last_name}</option>`
                    $('#client_id').append(newClient)
                    let address = ''
                    address += `${data.address}\n`
                    address += `${data.contact}\n`
                    address += `${data.email}`
                    $('#address').html(address)
                    $('#updateModal').modal("hide")
                }
             },
            error:(error)=>{ console.log(error) }
        })
    })
</script>
@endpush