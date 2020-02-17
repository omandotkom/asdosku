<?php

namespace App\Listeners;

use App\Events\UserWasActivated;
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
        Log::info("Mengirin notifikasi email berhasil aktivasi");
        Notification::send($asdos,new UserActivation($asdos));
    }
}
