<?php

namespace App\Http\Controllers;

use App\Payout;
use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Campus;
use App\Activity;
use App\Cost;

class PayoutController extends Controller
{
    public function viewallpayouts()
    {
        $transaction = Transaction::where('dosen', Auth::user()->id)->where('status', 'Menunggu Pembayaran')->orderBy('updated_at', 'desc')->withTrashed()->get();
        return view('maindashboard.index', ['transactions' => $transaction, 'title' => 'Daftar Tagihan Anda', 'content' => 'orderlist']);
    }
    public function viewpage($transaction_id)
    {
        $transaction = Transaction::where('id', $transaction_id)->first();
        $asdos = User::with('archive', 'detail')->where('users.id', $transaction->asdos)->orderBy('created_at', 'desc')->first();
        if (isset($asdos->archive->image_name)) {
            $asdos->archive->image_name = asset('storage/images/245/' . $asdos->archive->image_name);
        }
        $cost = Cost::where('transaction_id', $transaction->id)->orderBy('updated_at')->get();
        return view(
            'maindashboard.index',
            [
                'title' => 'Pembayaran Pesanan #' . $transaction->id,
                'transaction' => $transaction,
                'asdos' => $asdos,
                'costs' => $cost,
                'content' => 'payment'
            ]
        );
    }
    public function store(Request $request, $transaction_id){
        
    }
}
