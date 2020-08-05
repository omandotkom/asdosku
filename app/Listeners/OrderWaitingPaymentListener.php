<?php

namespace App\Listeners;

use App\Events\OrderWaitingPayment;
use App\Jobs\EmailJob;
use App\Notifications\EmailNotification;
use App\Notifications\MailContent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Pemberitahuan;
use App\Cost;
class OrderWaitingPaymentListener
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
    public function handle(OrderWaitingPayment $event)
    {
        //$mailDosen = new MailContent("Notifikasi Asdosku","Layanan dengan kode transaksi ".$event->transaction->id." telah selesai. Anda memiliki tagihan yang harus dibayar, silahkan login ke Asdosku untuk mengunggah bukti pembayaran","Masuk ke Asdosku",route('login'));
        $total_cost = Cost::where('transaction_id',$event->transaction->id)->sum('nominal');
        $total= $total_cost+$event->transaction->biaya;

        Pemberitahuan::create([
            'to' => $event->dosen->email,
            'subject' => 'Notifikasi Asdosku',
            'judul' => "Layanan dengan kode transaksi ".$event->transaction->id." telah selesai. Anda memiliki tagihan yang harus dibayar sebesar Rp.".number_format($total,2).", silahkan login ke Asdosku untuk mengunggah bukti pembayaran",
            'isi' => "Lihat Tagihan Anda",
            'url' => route('login'),
            'status' => 'unsent'
        ]);
        //EmailJob::dispatchNow($event->dosen,new EmailNotification($mailDosen));
    }
}
