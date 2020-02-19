<?php

namespace App\Listeners;

use App\Events\OrderWasDeleted;
use App\Notifications\EmailNotification;
use App\Notifications\MailContent;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Jobs\EmailJob;
class OrderWasDeletedListener
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
    public function handle(OrderWasDeleted $event)
    {
        $operational = User::where('role','operational')->get();
        $mailtoOperational = new MailContent("Notifikasi Asdosku",$event->dosen->name." Membatalkan pesanan dengan kode ".$event->transaction->id,"Lihat Daftar Pesanan",route('login')); 
        $mailToDosen = new MailContent("Notifikasi Asdosku","Pesanan Anda dengan kode ".$event->transaction->id." berhasil dibatalkan","Lihat Daftar Pesanan",route('login'));
        
        //ke operasinal
        foreach ($operational as $ops) {
            EmailJob::dispatch($ops, new EmailNotification($mailtoOperational));
        }
        //ke dosen
        EmailJob::dispatch($event->dosen, new EmailNotification($mailToDosen));
    }
}
