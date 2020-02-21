<?php

namespace App\Listeners;

use App\Events\OrderWasCreated;
use App\Jobs\EmailJob;
use App\Notifications\EmailNotification;
use App\Notifications\MailContent;
use App\User;

class OrderWasCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */

    public function handle(OrderWasCreated $event)
    {
        $mailContent = new MailContent(
            "Notifikasi Asdosku",
            "Untuk bagian operasional : Ada satu pesanan baru oleh " . $event->dosen->name . ", mohon login ke sistem untuk acc",
            "Lihat Pesanan Pending",
            route('login')
        );
        $to = User::where('role', "operational")->get();
        foreach ($to as $t) {
            EmailJob::dispatchNow($t, new EmailNotification($mailContent));
        }
    }
}
