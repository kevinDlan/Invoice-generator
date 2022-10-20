<?php

namespace App\Jobs;

use App\Mail\SendInvoiceMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class InvoiceMailSenderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $name;
    public string $email;
    public string $fileName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $receiverName, string $receiverMail, string $file)
    {
        //
        $this->name = $receiverName;
        $this->email = $receiverMail;
        $this->fileName = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::to($this->email)->send(new SendInvoiceMail($this->name, $this->fileName));
    }
}
