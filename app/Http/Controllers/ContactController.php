<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'subject' => 'required|string|min:5',
            'question' => 'required|string|min:5'
        ]);
        if ($validator->fails()) {
            return response('Pesan yang dimasukkan belum lengkap atau format salah.',400);
        }
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'question' => $request->question
        ]);
        return response("Berhasil mengirim pesan, balasan akan kami kirim via email.",200);
    }
}
