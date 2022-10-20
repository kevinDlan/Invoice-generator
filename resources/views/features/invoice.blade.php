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
</head>
<style>
    .add-customer,
    .add-new-prestation {
        text-decoration: none;
    }

    .form-content {
        padding-left: 7rem;
        padding-right: 7rem;
    }

    .prestation {
        background-color: #eef2ff;
        border: 2px solid #c7d2fe;
        border-radius: .375rem;
        padding: 1rem;
    }

    .bline {
        border: 2px solid #cccccc;
    }

    .preview {
        background-color: #a5a7b7;
    }

    .preview-body {
        margin-left: 80px;
        margin-right: 80px;
        margin-top: 20px;
        height: 94%;
        /* width: 50%; */
        background-color: white;
    }

    .close-prestation {
        cursor: pointer;
        /* position: absolute;
        left: 40.4rem;
        top: 23.5rem;
        display: none; */
    }

    */
</style>

<body>
    <div class="container-fluid">
        <div class="row invoice-body">
            <div class="col-md-6 form-content pt-4 pb-5 vh-100 col-lg-6 overflow-auto">
                <div class="title">
                    <h2 class="fw-bold text-center"><i class="bi bi-receipt"></i> Emission de Facture</h2>
                </div>
                <form id="invoice" action="">
                    <h4 class="fw-bold mt-4">Informations Client</h4>
                    <label for="client">Client</label>
                    <div class="form-floating mb-1 col-md-12 col-lg-12">
                        <select id="client" name="client" class="form-select" aria-label="client" aria-placeholder=""
                            required>
                            <option selected disabled>Veuillez selectionnez un client</option>
                        </select>
                    </div>
                    <div>
                        <a class="add-customer font-semibold fw-600" href=""><i class="bi bi-plus-circle-fill fs-5"></i>
                            <span class="fw-bold">Ajouter un client</span>
                        </a>
                    </div>
                    <h4 class="fw-bold mt-3">Prestations</h4>
                    <label for="device">Dévise</label>
                    <div class="form-floating mb-3 col-md-12 col-lg-12">
                        <select id="device" name="device" class="form-select mb-3" aria-label="service"
                            aria-placeholder="" required>
                            <option selected disabled>Veuillez selectionnez une dévise</option>
                            <option value="$">$</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-1 prestation">
                        <i class="bi bi-x-circle-fill close-prestation float-end"></i>
                        <div class="mb-2">
                            <label for="designation" class="form-label">Nom de la prestation</label>
                            <input type="text" class="form-control" id="designation" placeholder="Installation Caméra">
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <label for="quantity">Quantité</label>
                                <input id="quantity" type="text" class="form-control" placeholder="Quantité"
                                    aria-label="First name">
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="unitPrice">Prix Unitaire</label>
                                <input id="unitPrice" type="text" class="form-control" placeholder="Prix Unitaire"
                                    aria-label="First name">
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="taxe">Taxe</label>
                                <input id="taxe" type="text" class="form-control" placeholder="0"
                                    aria-label="First name">
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
            <div class="col-md-6 col-lg-6 vh-100 preview">
                <div class="preview-body">

                </div>
            </div>
        </div>
    </div>
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
            $("#add-new-prestation").on("click",(e)=>{
                e.preventDefault();
                template = $(".prestation:first").clone(true)
                console.log($(".prestation:first"))
                $('#form').append(template)
                time += 1;
            })

            // remove prestation
            $(".close-prestation").on('click', function(e){
                e.preventDefault();
                // alert(time)
                if(time > 1)
                {
                    // alert("remove")
                    $(this).parent('.prestation').remove();
                    time -= 1;
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
</body>

</html>