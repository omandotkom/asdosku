<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Campus;
use Illuminate\Support\Facades\Validator;
use App\Cost;
use App\Discount;
use App\Events\OrderWaitingPayment;
use App\Events\OrderWasApproved;
use App\Events\OrderWasCreated;
use App\Events\OrderWasDeleted;
use App\Jobs\EmailJob;
use App\Notifications\EmailNotification;
use App\Rate as USERRATE;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Transaction;
use CreateCostsTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Email;

class TransactionController extends Controller
{
    public function updatestatus($id, $status)
    {
        if ($status == "MP") {
            $status = "Menunggu Pembayaran";
        }
        $transaction = Transaction::find($id);
        $transaction->status = $status;
        $transaction->save();
        $dosen = User::find($transaction->dosen);
        if ($status == "Menunggu Pembayaran") {
            event(new OrderWaitingPayment($dosen, $transaction));
        } else {
            event(new OrderWasApproved($dosen, $transaction));
        }
        return $transaction;
    }
    public function showcosthistory($id)
    {
        $transaction = Transaction::with('activity')->where('id', $id)->first();
        $cost = Cost::where('transaction_id', $id)->get();

        return view('maindashboard.index', ['title' => "Historis Biaya", 'transaction' => $transaction, 'costs' => $cost, 'content' => 'historisbiaya']);
    }
    public function detil($id)
    {
        $transaction = DB::table('transactions')->select(
            'transactions.*',
            'users.name',
            'details.wa as waasdos',
            'users.email as emailasdos',
            'archives.image_name',
            'kampus.name as kampus',
            'activities.name as kegiatan',
            'activities.keterangan as keterangankegiatan',
            'activities.harga'
        )
            ->join('users', 'transactions.asdos', 'users.id')
            ->join('details', 'transactions.asdos', 'details.user_id')
            ->join('kampus', 'details.kampus_id', 'kampus.id')
            ->join('activities', 'transactions.activity_id', 'activities.id')
            ->join('archives', 'transactions.asdos', 'archives.user_id')
            ->where('transactions.id', $id)
            ->first();


        if (isset($transaction->image_name)) {
            $transaction->image_name = asset('storage/images/245/' . $transaction->image_name);
        }

        return response()->json($transaction);
    }
    public function store(Request $request, $activity, $asdos)
    {
        $validator = Validator::make($request->all(), [
            'dateDari' => ['required', 'date', 'max:255'],
            'dateSampai' => ['required', 'date', 'max:255'],
            'keterangan' => ['required', 'string', 'min:10'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $transaction = new Transaction;
        $transaction->asdos = $asdos;
        $transaction->dosen = Auth::user()->id;
        $transaction->activity_id = $activity;
        $transaction->dari = $request->dateDari;
        $transaction->sampai = $request->dateSampai;
        $transaction->keterangan = $request->keterangan;
      //  $transaction->biaya = $request->biaya;
        $transaction->status = 'Menunggu Konfirmasi Asdos';
       
        $totalBiaya = Activity::where("id",$activity)->first();
        $totalBiaya = $totalBiaya->harga; 
        
        if (isset($request->orderqty)){
            $totalBiaya = $totalBiaya * $request->orderqty;
        }
        if ($request->discountcode != "0"){
            //jika ada kode diskon
            $transaction->discount_id = $request->discountcode;
            $d = Discount::where('id',$request->discountcode)->first();
            $d = $d->discount;
            
            $transaction->total_discount = $totalBiaya * $d; 
            //$totalBiaya = $totalBiaya - $d;
        }
        $transaction->biaya = $totalBiaya;
        $transaction->save();

        event(new OrderWasCreated(Auth::user()));
        return redirect()->route('showUserOrder');
    }
    public function showUserOrder()
    {
        $transaction = Transaction::where('dosen', Auth::user()->id)->orderBy('created_at', 'desc')->withTrashed()->get();
        return view('maindashboard.index', ['transactions' => $transaction, 'title' => 'Daftar Pemesanan Anda', 'content' => 'orderlist']);
    }
    public function delete($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        if (isset($transaction)) {
            $transaction->status = "Dibatalkan";
            $transaction->save();
            $transaction->delete();
            event(new OrderWasDeleted(Auth::user(), $transaction));
        }
        return redirect()->route('showUserOrder');
    }
    public function currenttransaction()
    {
        $transaction = Transaction::where('transactions.status', 'Berjalan')
            ->select(
                'transactions.*',
                'users.name as dosen',
                'details.wa as wa',
                'activities.name as kegiatan'
            )
            ->join('users', 'transactions.dosen', 'users.id')
            ->join('activities', 'transactions.activity_id', 'activities.id')
            ->join('details', 'users.id', 'details.user_id')
            ->orderBy('transactions.updated_at', 'asc')->simplePaginate(10);
        //return $transaction;
        return view('maindashboard.index', ['transactions' => $transaction, 'title' => 'Daftar Pesanan yang Berjalan', 'content' => 'berjalanlist']);
    }
    public function viewtransactionasdosbystatus($status)
    {
        $transaction = Transaction::where('transactions.status', $status)->where('transactions.asdos', Auth::user()->id)
            ->select(
                'transactions.*',
                'users.name as dosen',
                'details.wa as wa',
                'activities.name as kegiatan',
                DB::raw('(activities.harga * activities.asdos) as basicpendapatan')
            )
            ->join('users', 'transactions.dosen', 'users.id')
            ->join('activities', 'transactions.activity_id', 'activities.id')
            ->join('details', 'users.id', 'details.user_id')

            ->orderBy('transactions.updated_at', 'asc')->simplePaginate(10);
        return view('maindashboard.index', ['transactions' => $transaction, 'title' => 'Daftar Asistensi Berjalan', 'content' => 'berjalanlist']);
    }
    public function pendingtransaction()
    {

        $transaction = Transaction::where('transactions.status', 'Menunggu Konfirmasi Asdos')
            ->select(
                'transactions.*',
                'users.name as dosen',
                'details.wa as wa',
                'activities.name as kegiatan'
            )
            ->join('users', 'transactions.dosen', 'users.id')
            ->join('activities', 'transactions.activity_id', 'activities.id')
            ->join('details', 'users.id', 'details.user_id')
            ->orderBy('transactions.updated_at')->simplePaginate(10);
        //return $transaction;
        return view('maindashboard.index', ['transactions' => $transaction, 'title' => 'Pesanan Asdos Menunggu Persetujuan', 'content' => 'pesananasdoslist']);
    }
    public function show($activity, $asdos)
    {
        $asdos = User::with('archive', 'detail')->where('users.id', $asdos)->orderBy('created_at', 'desc')->first();
        if (isset($asdos->archive->image_name)) {
            $asdos->archive->image_name = asset('storage/images/245/' . $asdos->archive->image_name);
        }
        $kampus = Campus::select('name as kampus')->where('id', $asdos->detail->kampus_id)->first();
        $activity = Activity::with('service')->where('id', $activity)->first();
        $rating = USERRATE::where('user_id', $asdos->id)->first();
        if (isset($rating)) {
            $rating->rating = $rating->rating . " / 5";
        }
        return view(
            'maindashboard.index',
            [
                'title' => 'Pemesanan',
                'rating' => $rating,
                'asdos' => $asdos,
                'kampus' => $kampus,
                'activity' => $activity,
                'content' => 'order'
            ]
        );
    }
}
