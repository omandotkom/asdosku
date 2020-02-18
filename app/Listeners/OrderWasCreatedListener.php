<?php

namespace App\Listeners;

use App\Events\OrderWasCreated;
use App\Notifications\EmailNotification;
use App\Notifications\MailContent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;
use Illuminate\Support\Facades\Notification;
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
        //ambil data akun operasional
        $operational = User::where('role','operational')->get();
        $mailOperational = new MailContent("Notifikasi Asdosku","Untuk bagian operasional : Ada satu pesanan baru oleh ".$event->dosen->name.", mohon login ke sistem untuk acc",
        "Lihat Pesanan Pending",route('login'));
        Notification::send($operational,new EmailNotification($mailOperational));
        
    }
}
