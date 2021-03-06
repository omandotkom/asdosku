<?php

namespace App\Listeners;

use App\Events\OrderWasApproved;
use App\Notifications\MailContent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailNotification;
use App\Jobs\EmailJob;
use App\Pemberitahuan;
class OrderWasApprovedListener
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
    public function handle(OrderWasApproved $event)
    {
     //$mailDosen = new MailContent("Notifikasi Asdosku","Selamat, permintaan asistensi dengan kode pemesanan ".$event->transaction->id ." sudah berjalan.","Cek Status Asistensi",route('login'));
     Pemberitahuan::create([
        'to' => $event->dosen->email,
        'subject' => 'Notifikasi Asdosku',
        'judul' => "Selamat, permintaan asistensi dengan kode pemesanan ".$event->transaction->id ." sudah berjalan.",
        'isi' => "Lihat Status Asistensi",
        'url' => route('login'),
        'status' => 'unsent'
    ]);

     // EmailJob::dispatchNow($event->dosen, new EmailNotification($mailDosen));
        
   //  Notification::send($event->dosen,new EmailNotification($mailDosen));
        
    }
}
