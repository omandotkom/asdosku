<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
class BasicNotification extends Controller
{
    public function view(Request $request){
        switch($request->type){
            case 'tagihan':
                $transaction = Transaction::where('dosen',$request->id)->where('status','Menunggu Pembayaran')->count();
                return $transaction;
            break;
        }
        
    }
}
