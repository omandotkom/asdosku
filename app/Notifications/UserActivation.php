<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
use Illuminate\Support\Facades\Log;
class UserActivation extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $asdos;
    public function __construct(User $asdos)
    {
        $this->asdos = $asdos;
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
        Log::info("sending to ".$this->asdos->email);
        return (new MailMessage)
        ->line('Kak,'.$this->asdos->name.' Selamat bergabung dengan keluarga asdosku. Akun kakak sudah diaktivasi oleh team Asdosku nih :) Langkah selanjutnya daftar ulang yaa dengan mencentang pekerjaan dan unggah foto profile.')
        ->action("Daftar Ulang", route('login'))
        ->line('Makasih kakk, jangan lupa login buat daftar ulang :)');
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
