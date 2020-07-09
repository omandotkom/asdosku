<?php

namespace App\Mail;

use App\Forgot;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;

class ForgotPassMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $lupa;
    public function __construct(Forgot $forgot_)
    {
        $this->lupa = $forgot_;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::debug($this->lupa->token);
        return $this->from("notification@asdosku.com")
            ->subject("Reset Pasword | Asdosku")
            ->view("auth.passwords.resetmail")
            ->with(['url' => $this->lupa->link]);
    }
}
