<?php

namespace App\Listeners;

use App\Events\OrderWasCreated;
use App\Jobs\EmailJob;
use App\Notifications\EmailNotification;
use App\Notifications\MailContent;
use App\User;
use App\Pemberitahuan;

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
       
        $to = User::where('role', "operational")->get();
        foreach ($to as $t) {
            Pemberitahuan::create([
                'to' => $t->email,
                'subject' => 'Notifikasi Asdosku',
                'judul' => "Untuk bagian operasional : Ada satu pesanan baru oleh " . $event->dosen->name . ", mohon login ke sistem untuk acc",
                'isi' => "Lihat Pesanan Pending",
                'url' => route('login'),
                'status' => 'unsent'
            ]);
            //EmailJob::dispatchNow($t, new EmailNotification($mailContent));
        }
        $asdos = User::where('id',$event->asdos)->first();
        Pemberitahuan::create([
            'to' => $asdos->email,
            'subject' => 'Notifikasi Asdosku',
            'judul' => "Kak ".$asdos->name." , ada orderan baru nih, cek ke website kita ya untuk segera disetujui. Jangan lupa lihat rinciannya dulu kak",
            'isi' => "Lihat Pesanan Pending",
            'url' => route('login'),
            'status' => 'unsent'
        ]);
        
    }
}
