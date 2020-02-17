<?php

namespace App\Listeners;

use App\Events\UserWasVerified;
use App\Notifications\AsdosAskActivation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\User;
use Illuminate\Support\Facades\Notification;
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
        $hrd = User::where('role','hrd')->get();
        Log::info("User meminta aktivasi ". $user->name);
        Notification::send($hrd, new AsdosAskActivation($user));
    }
}
