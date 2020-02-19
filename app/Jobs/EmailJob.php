<?php

namespace App\Jobs;

use App\Notifications\EmailNotification;
use App\Notifications\MailContent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;
use App\User;
class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public EmailNotification $emailNotification;
    public User $to;
    public function __construct(User $user, EmailNotification $emailNotification)
    {
        $this->to = $user;
        $this->emailNotification =  $emailNotification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        Notification::send($this->to, $this->emailNotification);
    }
}
