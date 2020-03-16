<?php

namespace App\Http\Controllers;

use App\Events\UserWasActivated;
use App\Events\UserWasRejected;
use App\User;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    public function view()
    {
        $belum_disetujui = User::where('status', 'belum_aktif')->whereNotNull('email_verified_at')->simplePaginate(20);
        return view('maindashboard.index', ['belum_disetujui' => $belum_disetujui, 'content' => 'persetujuanlist', 'title' => 'Persetujuan Pendaftaran']);
    }

    public function update($id)
    {
        //$belum_disetujui = User::where('status','belum_aktif')->simplePaginate(10);
        $user = User::where('id', $id)->first();
        $user->status = "aktif";
        $user->save();
        event(new UserWasActivated($user));
        return back();
    }
    public function reject($id){
        $user = User::where('id', $id)->first();
        $user->status = "gagal";
        $user->save();
        event(new UserWasRejected($user));
        return back();
    }
}
