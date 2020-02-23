<?php

namespace App\Listeners;

use App\Events\PaymentWaitingConfirmation;
use App\Jobs\EmailJob;
use App\Notifications\MailContent;
use App\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Pemberitahuan;
use App\Notifications\EmailNotification;
class PaymentWaitingConfirmationListener
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
    public function handle(PaymentWaitingConfirmation $event)
    {
        $dosen = User::find($event->payout->user_id);
        //$emailToDosen = new MailContent("Pembayaran Terkonfirmasi","Selamat, pembayaran anda untuk pesanan dengan nomor transaksi ".$event->payout->transaction_id." dan total pembayaran sebanyak Rp. ".$event->payout->total." sudah berhasil dikonfirmasi dan sudah lunas.","Lihat Status Tagihan",route('login'));
        //EmailJob::dispatchNow($dosen,new EmailNotification($emailToDosen));
        Pemberitahuan::create([
            'to' => $dosen->email,
            'subject' => 'Notifikasi Asdosku',
            'judul' => "Selamat, pembayaran anda untuk pesanan dengan nomor transaksi ".$event->payout->transaction_id." dan total pembayaran sebanyak Rp. ".$event->payout->total." sudah berhasil dikonfirmasi dan sudah lunas.",
            'isi' => "Lihat Status Tagihan",
            'url' => route('login'),
            'status' => 'unsent'
        ]);
    }
}
