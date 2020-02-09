<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Campus;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class TransactionController extends Controller
{
    public function detil($id){
        $transaction = DB::table('transactions')->select('transactions.*','users.name'
        ,'archives.image_name','kampus.name as kampus',
        'activities.name as kegiatan',
        'activities.keterangan as keterangankegiatan',
        'activities.harga')
        ->join('users','transactions.asdos','users.id')
        ->join('details','transactions.asdos','details.user_id')
        ->join('kampus','details.kampus_id','kampus.id')
        ->join('activities','transactions.activity_id','activities.id')
        ->join('archives','transactions.asdos','archives.user_id')
        ->first();
            if (isset($transaction->image_name)){
                $transaction->image_name = asset('storage/images/245/' . $transaction->image_name);
            }

        return response()->json($transaction);
    }
    public function store(Request $request, $activity, $asdos)
    {

        $transaction = new Transaction;
        $transaction->asdos = $asdos;
        $transaction->dosen = Auth::user()->id;
        $transaction->activity_id = $activity;
        $transaction->dari = $request->dateDari;
        $transaction->sampai = $request->dateSampai;
        $transaction->keterangan = $request->keterangan;
        $transaction->biaya = $request->biaya;
        $transaction->status = 'Mencari Asdos';
        $transaction->save();
        return redirect()->route('showUserOrder');
    }
    public function showUserOrder(){
        $transaction = Transaction::where('dosen',Auth::user()->id)->orderBy('updated_at','desc')->get();
        return view('maindashboard.index', ['transactions' => $transaction,'title' => 'Daftar Pemesanan Anda','content'=>'orderlist']);
    }
    public function show($activity, $asdos)
    {
        $asdos = User::with('archive', 'detail')->where('users.id', $asdos)->orderBy('created_at', 'desc')->first();
        if (isset($asdos->archive->image_name)) {
            $asdos->archive->image_name = asset('storage/images/245/' . $asdos->archive->image_name);
        }
        $kampus = Campus::select('name as kampus')->where('id', $asdos->detail->kampus_id)->first();
        $activity = Activity::with('service')->where('id', $activity)->first();

        return view(
            'maindashboard.index',
            [
                'title' => 'Pemesanan',
                'asdos' => $asdos,
                'kampus' => $kampus,
                'activity' => $activity,
                'content' => 'order'
            ]
        );
    }
}
