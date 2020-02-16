<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use App\Campus;
use App\Payout;
use Illuminate\Support\Facades\Log;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardIndexController extends Controller
{
    public function indexhrd()
    {
        $belum_aktif = User::where('status', 'belum_aktif')->count();
        return view('maindashboard.index', ['belum_aktif' => $belum_aktif, 'title' => "Dashboard"]);
    }

    public function indexoperational()
    {
        //return Auth::user();
        $pending = Transaction::where('status', 'Mencari Asdos')->count();
        $berjalan = Transaction::where('status', 'Berjalan')->count();
        $tagihan = Payout::where('status', 'Menunggu Konfirmasi Pembayaran')->count();
        return view('maindashboard.index', ['pending' => $pending, 'berjalan' => $berjalan, 'tagihan' => $tagihan, 'title' => "Dashboard"]);
    }
    public function indexDosen()
    {
        $bimbelActivity = Activity::select('id', 'name')->where('service_id', 'asbimbinganbelajar')->get();
        $matakuliahActivity = Activity::select('id', 'name')->where('service_id', 'asmatakuliah')->get();
        $penelitianActivity = Activity::select('id', 'name')->where('service_id', 'aspenelitian')->get();
        $proyekActivity = Activity::select('id', 'name')->where('service_id', 'asproyek')->get();
        $pengabdianActivity = Activity::select('id', 'name')->where('service_id', 'aspengabdian')->get();
        $karyaActivity = Activity::select('id', 'name')->where('service_id', 'askarya')->get();
        $desainerActivity = Activity::select('id', 'name')->where('service_id', 'asdesainer')->get();
        $campuses = Campus::all();
        return view('maindashboard.index', ['campuses' => $campuses, 'title' => 'Layanan', 'matakuliahactivity' => $matakuliahActivity, 'karyaactivity' => $karyaActivity, 'desaineractivity' => $desainerActivity, 'pengabdianactivity' => $pengabdianActivity, 'proyekactivity' => $proyekActivity, 'bimbelactivity' => $bimbelActivity, 'penelitianactivity' => $penelitianActivity]);
    }
    public function indexAsdos()
    {
        $berjalan = Transaction::where('status', 'Berjalan')->where('asdos', Auth::user()->id)->count();
        return view('maindashboard.index', ['title' => 'Dashboard', 'berjalan' => $berjalan]);
    }
}
