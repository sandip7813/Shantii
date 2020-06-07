<?php

namespace App\Mail;

use App\Contact_me;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class adminContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $contacts;
    
    public function __construct(Contact_me $Contact_me)
    {
        $this->contacts = $Contact_me;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sandip_nandy2005@yahoo.com')
                    ->subject('Shantii:: New Contact Message')
                    ->view('emails.admincontact')
                    ->with([$this->contacts]);
    }
}
