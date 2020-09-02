<?php

namespace App\Http\Controllers;

use App\Notifications\EmailNotification;
use App\Notifications\MailContent;
use Illuminate\Http\Request;
use App\Pemberitahuan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\User;
class NotificationController extends Controller
{
    public function check(){
        $notifications = Pemberitahuan::where("status","unsent")->get();
        foreach($notifications as $notification){
            $emailNotification = new EmailNotification(new MailContent($notification->subject,$notification->judul,$notification->isi,$notification->url));
            Log::info("Mengirim email ke ". $notification->to." NotificationController");
            $to = User::where('email',$notification->to)->first();
            Notification::send($to, $emailNotification);
            $notification->delete();
        }
    }
}
