<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public int $itemPrice;

    public function __construct(int $itemPrice)
    {
        $this->itemPrice = $itemPrice;
    }

    public function build()
    {
        return $this->markdown('confirmation');
    }
}
