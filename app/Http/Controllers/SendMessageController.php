<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MessageMail;
use Illuminate\Support\Facades\Mail;

class SendMessageController extends Controller
{
    public function kirimEmail(Request $req)
    {
    	$data['message'] = $req->message;
    	$data['subject'] = $req->subject;
    	$data['email'] = $req->email;
    	// dd($data);
    	Mail::to($req->email)
          ->send(new MessageMail($data));
        return redirect()->back()->with('success', 'Berhasil Mengirim pesan.');
    }
}
