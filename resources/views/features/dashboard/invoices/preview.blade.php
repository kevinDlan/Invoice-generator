@extends('layouts.app',['title'=>'Emission Facture | '.env('APP_NAME')])
@push("css")
<link rel="stylesheet" href="{{asset('template/dashboard/css/invoice.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Facture du  {{\Carbon\Carbon::create($invoice->created_at)->format("d/m/Y")}}</h6>
            <div class="float-end">
                <a class="btn btn-primary" target="_blank" href="{{route('pdf.view',$invoice->id)}}"> <i class="fa fa-file"></i> PDF</a>
                <a class="btn btn-primary" href="{{route('send.invoice',$invoice->id)}}"> <i class="fa fa-envelope"></i> Envoyer</a>
            </div>
        </div>
        <div class="content-invoice">
            <div class="cards">
                <div class="card-bodys">
                    <form id="invoice-form" class="invoice-form"
                        role="form">
                        @csrf
                        <div class="load-animate animated fadeInUp">
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <h4 class="title">Facture N°<sup class="fs-6">{{$invoice->invoice_no}}</sup></h4>
                                    <input type="hidden" name="invoice_no" value="10007">
                                </div>
                            </div>
                            {{-- <input id="currency" type="hidden" value="$"> --}}
                            <div class="row">
                                @include("partials._address",["invoice" => false])
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <h5>A,</h5>
                                    <div class="form-group mb-2">
                                        <input readonly type="text" class="form-control" name="customer" id="customer"
                                            value="{{$invoice->client->first_name." ".$invoice->client->last_name}}"
                                            autocomplete="off">
                                    </div>
                                    <div class="form-group mb-2">
                                        <textarea readonly class="form-control" rows="3" name="address" id="address"
                                            placeholder="Adresse">{{$invoice->client->address."\n".$invoice->client->contact."\n".$invoice->client->email}}
                                        </textarea>
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
                                        @foreach ($invoice->items as $item)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="itemRow custom-control-input"
                                                        id="itemRow_1">
                                                    <label class="custom-control-label" for="itemRow_1"></label>
                                                </div>
                                            </td>
                                            <td><input value="{{$item->item_ref}}" readonly type="text" name="productCode[]" id="productCode_1"
                                                    class="form-control" autocomplete="off" required></td>
                                            <td><input value="{{$item->designation}}" readonly type="text" name="productName[]" id="productName_1"
                                                    class="form-control" autocomplete="off" required></td>
                                            <td><input value="{{$item->quantity}}" readonly type="number" name="quantity[]" id="quantity_1"
                                                    class="form-control quantity" autocomplete="off" required></td>
                                            <td><input value="{{$item->unit_price}}" readonly type="number" name="price[]" id="price_1"
                                                    class="form-control price" autocomplete="off" required></td>
                                            <td><input value="{{$item->total}}" readonly type="number" name="total[]" id="total_1"
                                                    class="form-control total" autocomplete="off" required></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group mt-3 mb-3 ">
                                        <label>Sous-Total: &nbsp;</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text currency">€</span>
                                            </div>
                                            <input value="{{$invoice->sub_total}}" type="number" class="form-control" name="subTotal"
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
                                            <input value="{{$invoice->tax}}" type="number" class="form-control" name="taxRate"
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
                                            <input value="{{$invoice->tax_amount}}" type="number" class="form-control" name="taxAmount"
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
                                            <input readonly value="{{$invoice->total_amount}}" type="number" class="form-control"
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
                                            <input value="{{$invoice->paid_amount}}" type="number" class="form-control" name="amountPaid"
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
                                            <input readonly value="{{$invoice->due_amount}}" type="number" class="form-control" name="amountDue"
                                                id="amountDue" placeholder="Montant Due">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <h3>Notes: </h3>
                                    <div class="form-group">
                                        <textarea class="form-control txt" rows="5" name="notes" id="notes"
                                            placeholder="Your Notes"></textarea>
                                    </div>
                                    <br>
                                    <div class="form-group mt-4">
                                        <input type="hidden" value="test" class="form-control" name="userId">
                                        <input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn"
                                            value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
                                       
                                        <button class="btn btn-primary"> <i class="fa fa-file"></i>
                                            Télecharger</button>
                                        <button class="btn btn-primary"> <i class="fa fa-envelope"></i> Envoyer au
                                            mail</button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection