<?php

namespace App\Listeners;

use App\Events\UserWasVerified;
use App\Notifications\AsdosAskActivation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Log;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Jobs\EmailJob;
use App\Notifications\MailContent;
use Illuminate\Support\Facades\Mail;

class SendToLog
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
    public function handle(UserWasVerified $event)
    {
        $user = $event->user;
        $hrds = User::where('role','hrd')->get();
        foreach($hrds as $tohrd){
            EmailJob::dispatch($tohrd,new EmailNotification(new MailContent("Notifikasi Asdosku",$user->name." menunggu persetujuan Anda untuk bergabung dengan Asdosku. Silahkan di seleksi atau di interview sebelum acc","Masuk ke Asdosku",route('login'))));
            EmailJob::dispatch($user,new EmailNotification(new MailContent("Notifikasi Asodsku","Permintaan bergabung Anda sedang menunggu persetujuan","Masuk ke Asdosku",route('login'))));
        }
    }
}
