<?php

namespace App\Http\Controllers;

use App\Payout;
use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Campus;
use App\Activity;
use App\Comment;
use Illuminate\Support\Facades\Log;
use App\Cost;
use App\Rate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PayoutController extends Controller
{

    public function viewallpayouts()
    {
        $transaction = Transaction::with('payout')->where('dosen', Auth::user()->id)->where('status', 'Menunggu Pembayaran')->orderBy('updated_at', 'desc')->withTrashed()->get();
       // $payout = Payout::where('transaction_id',$transaction->id)->first();
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
    public function store(Request $request, $transaction_id)
    {
        $validator = Validator::make($request->all(), [
            'pembayaran' => 'required|file|image|mimes:jpeg,png,jpg',
            'rating' => 'required',
            'komentar' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        }
        //pathnya

        $transaction = Transaction::find($transaction_id);
        $comment = new Comment;
        $comment->transaction_id = $transaction_id;
        $comment->user_id = $transaction->asdos;
        $comment->comment = $request->komentar;
        $comment->save();


        $path = $request->file('pembayaran')->store('buktipembayaran', 'public');
        $payout = new Payout;
        $payout->user_id = Auth::user()->id;
        $payout->transaction_id = $transaction_id;
        $payout->buktipembayaran = $path;
        $payout->total = $request->total;
        $payout->status  = 'Menunggu Konfirmasi';
        $payout->save();

        $rating = Rate::where('user_id', Auth::user()->id)->first();
        if (isset($rating)) {
            $person = $rating->person;
            $rating->person = $rating->person + 1;
            $oldrating = $rating->rating;
            $oldrating = ($oldrating + $request->rating) / $person;
            $rating->rating = $oldrating;
            $rating->save();
        } else {
            $rating = new Rate;
            $rating->person = 1;
            $rating->user_id = Auth::user()->id;;
            $rating->rating = $request->rating;
            $rating->save();
        }
        //   return asset("storage/".$path); 
    }
}
