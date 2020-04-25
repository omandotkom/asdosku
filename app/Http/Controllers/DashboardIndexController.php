<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Bid;
use App\User;
use App\Campus;
use App\Jurusans;
use App\Payout;
use Illuminate\Support\Facades\Log;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardIndexController extends Controller
{
    public function indexhrd()
    {
        $belum_aktif = User::where('status', 'belum_aktif')->whereNotNull('email_verified_at')->count();
        return view('maindashboard.index', ['belum_aktif' => $belum_aktif, 'title' => "Dashboard"]);
    }

    public function indexoperational()
    {
        //return Auth::user();

        $pending = Transaction::where('status', 'Menunggu Konfirmasi Asdos')->count();
        $berjalan = Transaction::where('status', 'Berjalan')->count();
        $payout = Transaction::where('status','Menunggu Pembayaran')->count();
        $tagihan = Payout::where('status', 'Menunggu Konfirmasi Pembayaran')->count();
        $asdos = User::select('id')->where('role','asdos')->where('status','aktif')->count();
        $dosen = User::select('id')->where('role','dosen')->count();
        $finishedpayout = Payout::where('status','Selesai')->count();
        $active_bids = Bid::select('id')->where('status','active')->count();
        $deactive_bids = Bid::select('id')->where('status','deactive')->count();
        return view('maindashboard.index', ['pending' => $pending,'activebids' => $active_bids,'deactivebids'=>$deactive_bids,'finishedpayout'=>$finishedpayout,'dosen' => $dosen,'asdos' => $asdos,'payout'=>$payout, 'berjalan' => $berjalan, 'tagihan' => $tagihan, 'title' => "Dashboard"]);
    }
    public function indexDosen()
    {
        $bimbelActivity = Activity::select('id', 'name')->where('service_id', 'asbimbinganbelajar')->get();
        $matakuliahActivity = Activity::select('id', 'name')->where('service_id', 'asmatakuliah')->get();
        $praktikumActivity = Activity::select('id', 'name')->where('service_id', 'aspraktikum')->get();
        $penelitianActivity = Activity::select('id', 'name')->where('service_id', 'aspenelitian')->get();
        $proyekActivity = Activity::select('id', 'name')->where('service_id', 'asproyek')->get();
        $admActivity = Activity::select('id', 'name')->where('service_id', 'asadm')->get();
        $karyaActivity = Activity::select('id', 'name')->where('service_id', 'askarya')->get();
        $desainerActivity = Activity::select('id', 'name')->where('service_id', 'asdesainer')->get();
        $campuses = Campus::all();
        $jurusans = Jurusans::all();
        return view('maindashboard.index', [
            'campuses' => $campuses,
            'jurusans' => $jurusans, 'title' => 'Layanan', 'matakuliahactivity' => $matakuliahActivity,
            'praktikumactivity' => $praktikumActivity,
            'karyaactivity' => $karyaActivity, 'desaineractivity' => $desainerActivity,
            'admactivity' => $admActivity, 'proyekactivity' => $proyekActivity,
            'bimbelactivity' => $bimbelActivity, 'penelitianactivity' => $penelitianActivity
        ]);
    }
    public function indexAsdos()
    {
        $berjalan = Transaction::select('id')->where('status', 'Berjalan')->where('asdos', Auth::user()->id)->count();
        $selesai = Transaction::select('id')->where('status', 'Selesai')->where('asdos', Auth::user()->id)->count();
        $request = Transaction::select('id')->where('status', 'Menunggu Konfirmasi Asdos')->where('asdos', Auth::user()->id)->count();
        $bids = Bid::select('id')->where('status','active')->get()->count();
        return view('maindashboard.index', ['title' => 'Dashboard','bids' =>$bids ,'berjalan' => $berjalan, 'selesai' => $selesai, 'request' => $request]);
    }
    public function indexmarketing()
    {
        $campuses = Campus::all();

        return view('maindashboard.index', ['title' => 'List Asdos', 'campuses' => $campuses]);
    }
}
