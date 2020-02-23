<?php

namespace App\Listeners;

use App\Events\OrderWaitingPaymentConfirmation;
use App\Jobs\EmailJob;
use App\Notifications\EmailNotification;
use App\Notifications\MailContent;
use App\Pemberitahuan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;
use Illuminate\Support\Facades\Notification;

class OrderWaitingPaymentConfirmationListener
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
    public function handle(OrderWaitingPaymentConfirmation $event)
    {
        $operational = User::where('role', "operational")->get();
        //$mailContent = new MailContent("Notifikasi Asdosku", $event->dosen->name . " baru saja melakukan pembayaran dengan kode pembayaran " . $event->payout->id . " sebesar Rp, " . $event->payout->total . ". Mohon segera konfirmasi pembayaran pada dashboard", "Periksa Pembayaran", route('login'));
        foreach ($operational as $op) {
            // EmailJob::dispatchNow($op, new EmailNotification($mailContent));
            Pemberitahuan::create([
                'to' => $op->email,
                'subject' => 'Notifikasi Asdosku',
                'judul' => $event->dosen->name . " baru saja melakukan pembayaran dengan kode pembayaran " . $event->payout->id . " sebesar Rp, " . $event->payout->total . ". Mohon segera konfirmasi pembayaran pada dashboard",
                'isi' => "Periksa Pembayaran",
                'url' => route('login'),
                'status' => 'unsent'
            ]);
        }
    }
}
