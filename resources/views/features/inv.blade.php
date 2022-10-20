<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emission Facture | {{env("APP_NAME")}}</title>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    @extends('layouts.app',['title'=>'Emission Facture | '.env('APP_NAME')])
    @push("css")
    <link rel="stylesheet" href="{{asset('template/dashboard/css/invoice.css')}}">
    @endpush
    @section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0">Emission de facture</h5>
                <a class="btn btn-primary" href="{{route('projects.index')}}0">Liste des factures</a>
            </div>
            <div class="col-md-8 form-content pt-4 col-lg-8">
                <form method="POST" action="{{route(" invoices.store")}}">
                    @csrf
                    <label for="client">Client</label>
                    <div class="form-floating mb-1 col-md-12 col-lg-12">
                        <select id="client" name="client" class="form-select" aria-label="client" aria-placeholder=""
                            required>
                            <option selected disabled>Veuillez selectionnez un client</option>
                        </select>
                    </div>
                    <div>
                        <a class="add-customer font-semibold fw-600" href=""><i class="bi bi-plus-circle-fill fs-6"></i>
                            <span class="fw-bold">Ajouter un client</span>
                        </a>
                    </div>
                    <h5 class="fw-bold mt-3">Prestations</h5>
                    <label for="device">Dévise</label>
                    <div class="form-floating mb-3 col-md-12 col-lg-12">
                        <select id="device" name="devise" class="form-select mb-3" aria-label="service"
                            aria-placeholder="" required>
                            <option selected disabled>Veuillez selectionnez une dévise</option>
                            <option value="$">$</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-1 prestation">
                        <i class="bi bi-x-circle-fill close-prestation float-end"></i>
                        <div class="mb-2">
                            <label for="designation" class="form-label">Nom de la prestation</label>
                            <input name="designation0" type="text" class="form-control"
                                placeholder="Installation Caméra" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <label for="quantity">Quantité</label>
                                <input name="quantity0" type="number" class="form-control" placeholder="Quantité"
                                    aria-label="quantity" required>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="unitPrice">Prix Unitaire</label>
                                <input name="unitPrice0" type="number" class="form-control" placeholder="Prix Unitaire"
                                    aria-label="unitPrice" required>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="taxe">Taxe</label>
                                <input name="taxe0" type="number" class="form-control" placeholder="0" aria-label="taxe"
                                    required>
                                <input id="time" type="hidden" name="time" required>
                            </div>
                        </div>
                    </div>
                    <div id="form">

                    </div>
                    <div class="mb-3">
                        <a id="add-new-prestation" class="add-new-prestation" href="#"><i
                                class="bi bi-plus-circle-fill fs-5"></i>
                            <span class="fw-bold">Ajouter une prestation</span></a>
                    </div>
                    <div class="bline mt-2 mb-2"></div>
                    <div class="float-end">
                        <button class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $( async ()=>{
                    $('.prestation').on('mouseover',function(e)
                    {
                        // $(this).children(".close-prestation").css("display","")
                        // $(this + '>div.close-prestation').css({"display":"visible"})
                    });
        
                    const clients = await fetchAllClient();
                    client = '';
                    if(clients !== null){
                        clients.map(c => client += `<option value="${c.id}">${c.first_name} ${c.last_name}</option>`);
                        $("#client").append(client)
        
                        console.log(client)
                    }
        
                    // add new prestation
                    let time = 1;
                    $('#time').val(time);
                    $("#add-new-prestation").on("click",(e)=>{
                        e.preventDefault();
                        template = $(".prestation:first").clone(true)
                        template.find('input').each( 
                            function(){
                                let name = $(this).attr('name')
                                $(this).attr('name',`${name.slice(0,-1)+time}`)
                            }
                            )
                        $('#form').append(template)
                        time += 1;
                        $('#time').val(time);
                    })
        
                    // remove prestation
                    $(".close-prestation").on('click', function(e){
                        e.preventDefault();
                        const parent = $(this)
                        // alert(time)
                        if(time > 1)
                        {
                         $(this).parent('.prestation').find('input').each(function(){
                                const name = $(this).attr("name")
                                if(time === parseInt(name.slice(-1))+1)
                                {
                                    $(parent).parent('.prestation').remove();
                                    time -= 1;
                                    $('#time').val(time);
                                    return false;
                                }else
                                {
                                    alert('veuillez supprimer dans l\'ordre de création')
                                    return false
                                }

                            })
                        }
                    })
        
                })
                // select all client
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
    </script>
    @endpush