<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Service;

class DetailLayananController extends Controller
{
    public function index($layanan)
    {
    	$nama_layanan = Service::find($layanan);
    	// dd($nama_layanan);
    	$daftar = Activity::where('service_id',$layanan)->get();
    	// dd($daftar);
    	return view('detail_layanan',compact('daftar','nama_layanan'));
    }
}
