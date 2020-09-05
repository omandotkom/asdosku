<?php
namespace App\Notifications;
class MailContent{
    public $subject;
    public $judul;
    public $isi;
    public $url;
    public function __construct($subject,$judul,$isi,$url)
    {
        $this->judul = $judul;
        $this->isi = $isi;
        $this->url = $url;
        $this->subject = $subject;
    }
}