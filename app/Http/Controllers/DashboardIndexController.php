<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use Illuminate\Http\Request;

class DashboardIndexController extends Controller
{
    public function indexhrd()
    {
        $belum_aktif = User::where('status', 'belum_aktif')->count();
        return view('maindashboard.index', ['belum_aktif' => $belum_aktif]);
    }
    public function indexasdos()
    {
    }
    public function indexDosen()
    {
        $bimbelActivity = Activity::select('id','name')->where('service_id','asbimbinganbelajar')->get();
        $matakuliahActivity = Activity::select('id','name')->where('service_id','asmatakuliah')->get();
        $penelitianActivity = Activity::select('id','name')->where('service_id','aspenelitian')->get();
        $proyekActivity = Activity::select('id','name')->where('service_id','asproyek')->get();
        $pengabdianActivity = Activity::select('id','name')->where('service_id','aspengabdian')->get();
        $karyaActivity = Activity::select('id','name')->where('service_id','askarya')->get();
        $desainerActivity = Activity::select('id','name')->where('service_id','asdesainer')->get();
        return view('maindashboard.index', ['title' => 'Layanan','matakuliahactivity' => $matakuliahActivity,'karyaactivity' => $karyaActivity,'desaineractivity' => $desainerActivity,'pengabdianactivity' => $pengabdianActivity,'proyekactivity'=>$proyekActivity,'bimbelactivity' => $bimbelActivity,'penelitianactivity' => $penelitianActivity]);
    }
}
