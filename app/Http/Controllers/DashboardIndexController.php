<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class DashboardIndexController extends Controller
{
    public function indexhrd(){
        $belum_aktif = User::where('status','belum_aktif')->count();
        return view('maindashboard.index', ['belum_aktif' => $belum_aktif]);
    }
}
