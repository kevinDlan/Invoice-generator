<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use App\Invoice\InvoiceGenerator;
use App\Jobs\InvoiceMailSenderJob;
use Illuminate\Support\Carbon;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("features.dashboard.invoices.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("features.dashboard.invoices.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->storeInvoice($request);
        return to_route("invoices.index")->with('msg', 'successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAndSendMail(Request $request){
        $invoice = $this->storeInvoice($request);
        $generator = new InvoiceGenerator($invoice);
        $pdfLink = $generator->savePDFFile();
        $this->sendInvoiceMail($invoice);
        return to_route("invoices.index")->with('msg', 'successfully');
    }

    public function sendInvoice(Invoice $invoice){
        $this->sendInvoiceMail($invoice);
        return to_route("invoices.index")->with('msg', 'successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
        // dd($invoice);
        return view("features.dashboard.invoices.preview",["invoice"=>$invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
        return view("features.dashboard.invoices.update", ["invoice" => $invoice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
        // $this->validate($request, [
        //     "client_id" => "required|integer|exists:clients,id",
        // ]);
        try
        {
            $invoice->sub_total  = $request->subTotal;
            $invoice->tax_amount  = $request->taxAmount;
            $invoice->total_amount  = $request->totalAftertax;
            $invoice->paid_amount  = $request->amountPaid ?? 0;
            $invoice->due_amount  = $request->amountDue;
            $invoice->tax = $request->taxRate;


            if (count($request->productCode) > count($invoice->items)) {
                // user add more item during update
                $itemsUpdated = 0;
                for ($i = 0; $i < count($invoice->items); $i++) {
                    $invoice->items[$i]["item_ref"] =  $request->productCode[$i];
                    $invoice->items[$i]["designation"] = $request->productName[$i];
                    $invoice->items[$i]["quantity"] = $request->quantity[$i];
                    $invoice->items[$i]["unit_price"] = $request->price[$i];
                    $invoice->items[$i]["total"] = $request->total[$i];
                    $itemsUpdated += 1;
                }

                for ($j = $itemsUpdated; $j < count($request->productCode); $j++) {
                    InvoiceItem::create([
                        "invoice_id" => $invoice->id,
                        "item_ref" => $request->productCode[$j],
                        "designation" => $request->productName[$j],
                        "quantity" => $request->quantity[$j],
                        "unit_price" => $request->price[$j],
                        "total" => $request->total[$j]
                    ]);
                }
            } elseif (count($request->productCode) === count($invoice->items)) {
                // user delete some items during update
                for ($k = 0; $k < count($invoice->items); $k++) {
                    $invoice->items[$k]["item_ref"] =  $request->productCode[$k];
                    $invoice->items[$k]["designation"] = $request->productName[$k];
                    $invoice->items[$k]["quantity"] = $request->quantity[$k];
                    $invoice->items[$k]["unit_price"] = $request->price[$k];
                    $invoice->items[$k]["total"] = $request->total[$k];
                }
            } else {
                $itemsUpdated = 0;
                for ($l = 0; $l < count($request->productCode); $l++) {
                    $invoice->items[$l]["item_ref"] =  $request->productCode[$l];
                    $invoice->items[$l]["designation"] = $request->productName[$l];
                    $invoice->items[$l]["quantity"] = $request->quantity[$l];
                    $invoice->items[$l]["unit_price"] = $request->price[$l];
                    $invoice->items[$l]["total"] = $request->total[$l];
                    $itemsUpdated += 1;
                }

                $mustDeletedItemsId = [];
                for ($n = $itemsUpdated; $n < count($invoice->items); $n += 1) {
                    array_push($mustDeletedItemsId, $invoice->items[$n]['id']);
                }

                InvoiceItem::whereIn('id', $mustDeletedItemsId)->delete();
            }
            $invoice->save();

            return to_route('invoices.index')->with('msg', 'successfully');
        }catch(\Throwable $th){
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
        $mustDeletedItemsId = [];
        for ($n = 0; $n < count($invoice->items); $n += 1) {
            array_push($mustDeletedItemsId, $invoice->items[$n]['id']);
        }
        InvoiceItem::whereIn('id', $mustDeletedItemsId)->delete();
        $invoice->delete();
        return to_route('invoices.index')->with('msg', 'successfully');
    }

    public function getPDF(Invoice $invoice)
    {
       $generator = new InvoiceGenerator($invoice);
       return $generator->browserView();
    }

    public function sendInvoiceMail(Invoice $invoice)
    {
        $generator = new InvoiceGenerator($invoice);
        $file = $generator->savePDFFile();
        $job = (new InvoiceMailSenderJob(
            $invoice->client->first_name." ".$invoice->client->last_name, 
            $invoice->client->email, public_path($file)))->delay(Carbon::now()->addSeconds(3));
        dispatch($job); 
    }

    private function storeInvoice(Request $request):Invoice{
        $this->validate($request, [
            "client_id" => "required|integer|exists:clients,id",
            [
                "client_id.required" => "Veuillez ajouter un client"
            ]
        ]);


        $invoice = Invoice::create([
            "client_id" => $request->client_id,
            "invoice_no" => rand(0, 99999),
            "sub_total" => $request->subTotal,
            "tax" => $request->taxRate,
            "tax_amount" => $request->taxAmount,
            "total_amount" => $request->totalAftertax,
            "paid_amount" => $request->amountPaid ?? 0,
            "due_amount" => $request->amountDue
        ]);
        for ($i = 0; $i < count($request->productCode); $i++) {
            InvoiceItem::create([
                "invoice_id" => $invoice->id,
                "item_ref" => $request->productCode[$i],
                "designation" => $request->productName[$i],
                "quantity" => $request->quantity[$i],
                "unit_price" => $request->price[$i],
                "total" => $request->total[$i]
            ]);
        }

        return  $invoice;
    }
}
