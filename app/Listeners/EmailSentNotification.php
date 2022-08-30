<?php

namespace App\Listeners;

use App\Mail\ConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailSentNotification
{
    public function __construct()
    {

    }

    public function handle($event)
    {
        Mail::to($event->user->email)
            ->queue(new ConfirmationMail($event->item->price));
    }
}
