<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Enquiry;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Enquiry $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.enquiry')
        ->with([
            'name' => $this->enquiry->name,
            'email' => $this->enquiry->email,
            'phone' => $this->enquiry->phone,
            'item' => $this->enquiry->item,
            'text' => $this->enquiry->message,
        ]);
    }
}
