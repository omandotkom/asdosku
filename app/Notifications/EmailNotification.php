<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Notifications\MailContent;
use Illuminate\Support\Facades\Log;
class EmailNotification extends Notification
{
   
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $emailContent;
    public function __construct(MailContent $emailContent)
    {
        // dd($emailContent);
        $this->emailContent = $emailContent;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        Log::debug("composing email...");
        return (new MailMessage)
                    ->subject($this->emailContent->subject)
                    ->line($this->emailContent->judul)
                    ->action($this->emailContent->isi, $this->emailContent->url);
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
