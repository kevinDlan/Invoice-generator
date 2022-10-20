<!DOCTYPE html>
<html>

<head>
    <style>
        html,
        body {
            font-family: sans-serif;
        }

        #invoice {
            max-width: 800px;
            margin: 0 auto;
        }

        #company,
        #billship {
            margin-bottom: 30px;
        }

        #billship,
        #company,
        #items {
            width: 100%;
            border-collapse: collapse;
        }

        #company td,
        #billship td,
        #items td,
        #items th {
            padding: 10px;
        }

        #company td {
            vertical-align: top;
        }

        #bigi {
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: 700;
            color: #258ec7;
        }

        #co-addr {
            font-size: 0.95em;
            color: #888;
        }

        #co-right img {
            max-width: 180px;
            height: auto;
        }

        #billship td {
            width: 33%;
        }

        #items th {
            text-align: left;
            background: #98c5dc;
            padding: 20px 10px;
        }

        #items td {
            background: #e4eff5;
            border-bottom: 1px solid #c8d2d7;
        }

        .idesc {
            color: #6099b6;
        }

        #items tr.ttl td {
            background: #98c5dc;
            border-bottom: none;
            font-weight: 700;
        }

        .right {
            text-align: right;
        }

        #notes {
            background: #e4eff5;
            padding: 10px;
            position: relative;
            top: 300px;
            
        }
    </style>
    <title>Visualisation facture</title>
</head>

<body>
    <div id="invoice">
        <!-- Compagny Logo -->
        <table id="company">
            <tr>
                <td id="co-left">
                    <div id="bigi">Facture</div>
                    <div id="co-addr">
                        @include("partials._address",["invoice" => true])
                    </div>
                </td>
                <td id="co-right" class="right">
                    <img src="{{$invoice->getLogo() }}" width="80px" />
                </td>
            </tr>
        </table>
        <!-- Buill To -->
        <table id="billship">
            <tr>
                <td>
                    <strong>Facture à</strong><br />
                    {{$invoice->buyer->last_name}} {{$invoice->buyer->first_name}}<br>
                    {{$invoice->buyer->address}}<br>
                    {{$invoice->buyer->contact}}
                </td>
                <td>
                    <strong>Envoyer à</strong><br />
                    {{$invoice->buyer->last_name}} {{$invoice->buyer->first_name}}<br>
                    {{$invoice->buyer->email}}<br>
                    {{$invoice->buyer->contact}}
                </td>
                <td>
                    <strong>Facture #:00845</strong><br>
                    Edité le : {{$invoice->buyer->create_at}}<br>
                    Date : {{$invoice->buyer->day_date}} <br>
                    {{""}}
                </td>
            </tr>
        </table>
        <!-- Items -->
        <table id="items">
            <tr>
                <th>DESIGNATION</th>
                <th>QUANTITE</th>
                <th>PRIX UNITAIRE</th>
                <th>MONTANT</th>
            </tr>
            <!-- begin foreach -->
            @foreach ($invoice->buyer->items as $item)
                <tr>
                    <td>{{$item->designation}}</td>
                    <td>{{$item->quatity}}</td>
                    <td>{{number_format($item->unit_price,0,null,' ')}} €</td>
                    <td>{{number_format($item->total,0,null,' ')}} €</td>
                </tr>
            @endforeach

            <!-- end foreach -->
            <!-- Invoice Infos -->
            <tr class="ttl">
                <td class="right" colspan="3">Sous-Total : </td>
                <td>{{number_format($invoice->buyer->sub_total,0,null,' ')}} €</td>
            </tr>
            <tr class="ttl">
                <td class="right" colspan="3">TVA({{$invoice->buyer->tax}}%) : </td>
                <td>{{number_format($invoice->buyer->tax_amount,0,null,' ')}} €</td>
            </tr>
            <tr class="ttl">
                <td class="right" colspan="3">Net à Payer : </td>
                <td>{{number_format($invoice->buyer->total_amount,0,null,' ')}} €</td>
            </tr>
            <tr class="ttl">
                <td class="right" colspan="3">Montant Payer : </td>
                <td>{{number_format($invoice->buyer->paid_amount,0,null,' ')}} €</td>
            </tr>
            <tr class="ttl">
                <td class="right" colspan="3">Montant Due : </td>
                <td>{{number_format($invoice->buyer->due_amount,0,null,' ')}} €</td>
            </tr>
        </table>
        <!-- Note -->
        <div id="notes">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum eius natus placeat beatae sequi architecto, velit asperiores amet? Eum id ipsa porro illo laborum maxime consequatur sint vel veniam? Itaque!
        </div>
    </div>
</body>

</html>