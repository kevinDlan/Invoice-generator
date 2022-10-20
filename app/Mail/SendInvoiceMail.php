<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $fileName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $file)
    {
        //
        $this->name = $name;
        $this->fileName = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view("emails.send-invoice")
                    ->subject("Direct-Vision (Facture) ")
                    ->attach($this->fileName)
                    ->text("emails.send-invoice");
    }
}
