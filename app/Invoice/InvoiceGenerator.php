<?php

namespace App\Invoice;

use App\Models\Invoice;
use Illuminate\Support\Carbon;
use LaravelDaily\Invoices\Invoice as Inv;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;



class InvoiceGenerator
{
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
        $this->customer = new Buyer([
            "last_name" => $this->invoice->client->last_name,
            "first_name" => $this->invoice->client->first_name,
            "contact" => $this->invoice->client->contact,
            "address" => $this->invoice->client->address,
            "email" => $this->invoice->client->email,
            "create_at" => Carbon::create($this->invoice->created_date)->format("d-m-Y"),
            "day_date" => Carbon::now()->format("d-m-Y"),
            "items" => $this->invoice->items,
            "sub_total" => $this->invoice->sub_total,
            "tax" => $this->invoice->tax,
            "tax_amount" => $this->invoice->tax_amount,
            "total" => $this->invoice->total_amount,
            "paid_amount" => $this->invoice->paid_amount,
            "due_amount" => $this->invoice->due_amount,
        ]);
    }


    public function browserView(){
        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);
        $invoice = Inv::make()
            ->template('invoice')
            ->logo(public_path("template/images/logo.png"))
            ->buyer($this->customer)
            ->addItem($item);
        return $invoice->stream();
    }

    public function savePDFFile(){
        $file_name = Carbon::now()->timestamp . time();
        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);
        $invoice = Inv::make()
            ->template('invoice')
            ->logo(public_path("template/images/logo.png"))
            ->buyer($this->customer)
            ->filename($file_name)
            ->addItem($item)
            ->save("factures");
        return 'factures/' . $file_name . '.pdf';
    }
}
