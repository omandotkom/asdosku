<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use App\Campus;
use Illuminate\Http\Request;

class DashboardIndexController extends Controller
{
    public function indexhrd()
    {
        $belum_aktif = User::where('status', 'belum_aktif')->count();
        return view('maindashboard.index', ['belum_aktif' => $belum_aktif,'title' => "Dashboard"]);
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
        $campuses = Campus::all();
        return view('maindashboard.index', ['campuses' => $campuses,'title' => 'Layanan','matakuliahactivity' => $matakuliahActivity,'karyaactivity' => $karyaActivity,'desaineractivity' => $desainerActivity,'pengabdianactivity' => $pengabdianActivity,'proyekactivity'=>$proyekActivity,'bimbelactivity' => $bimbelActivity,'penelitianactivity' => $penelitianActivity]);
    }
}
