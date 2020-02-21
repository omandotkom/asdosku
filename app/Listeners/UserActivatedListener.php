<?php

namespace App\Listeners;

use App\Events\UserWasActivated;
use App\Jobs\EmailJob;
use App\Notifications\EmailNotification;
use App\Notifications\MailContent;
use App\Notifications\UserActivation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class UserActivatedListener
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
    public function handle(UserWasActivated $event)
    {
        $asdos = $event->user;
        $Notification = new EmailNotification(new MailContent("Notifikasi Asdosku","Kak,".$event->user->name." Selamat bergabung dengan keluarga asdosku. Akun kakak sudah diaktivasi oleh team Asdosku nih :) Langkah selanjutnya daftar ulang yaa dengan mencentang pekerjaan dan unggah foto profile.","Daftar Ulang Sekarang",route('login')));
        Log::info("Mengirin notifikasi email berhasil aktivasi ke ".$asdos->email);
        EmailJob::dispatch($asdos, $Notification);
        
    }
}
