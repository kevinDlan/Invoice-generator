<?php

namespace App\Jobs;

use App\Mail\ContactUsEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ContactMailSenderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $request)
    {
        //
        $this->data = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::to("kevinkone19@gmail.com")->cc("konekevinkone1@gmail.com")->send(new ContactUsEmail($this->data));
    }
}
