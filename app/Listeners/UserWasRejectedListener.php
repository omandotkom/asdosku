<?php

namespace App\Listeners;

use App\Events\UserWasRejected;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Pemberitahuan;
class UserWasRejectedListener
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
    public function handle(UserWasRejected $event)
    {
        $asdos = $event->user;
        //$Notification = new EmailNotification(new MailContent("Notifikasi Asdosku","Kak,".$event->user->name." Selamat bergabung dengan keluarga asdosku. Akun kakak sudah diaktivasi oleh team Asdosku nih :) Langkah selanjutnya daftar ulang yaa dengan mencentang pekerjaan dan unggah foto profile.","Daftar Ulang Sekarang",route('login')));
        Log::info("Mengirin notifikasi email rejection ke ".$asdos->email);
        //Notification::send($asdos, $Notification);
        Pemberitahuan::create([
            'to' => $asdos->email,
            'subject' => 'Notifikasi Asdosku',
            'judul' => "Kak ".$event->user->name." , Pengumuman seleksi asdos sudah keluar, silahkan log in ke website :)",
            'isi' => "Login",
            'url' => route('login'),
            'status' => 'unsent'
        ]);
        
    }
}
