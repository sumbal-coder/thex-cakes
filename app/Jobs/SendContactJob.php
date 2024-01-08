<?php

namespace App\Jobs;

use Mail;
use App\Mail\SendContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $contact;
    /**
     * Create a new job instance.
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            \Mail::to(env('MAIL_TO_ADDRESS'))->send(new SendContactMail($this->contact));
            return "Email sent successfully!";
        } catch (\Exception $e) {
            return "Error sending email: " . $e->getMessage();
        }
    }
}
