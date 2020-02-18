<?php

namespace App\Http\Controllers;

use App\Events\UserWasActivated;
use App\User;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    public function view()
    {
        $belum_disetujui = User::where('status', 'belum_aktif')->orderBy('created_at','asc')->simplePaginate(10);
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
}
