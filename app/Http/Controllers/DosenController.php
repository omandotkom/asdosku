<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class DosenController extends Controller
{
    public function view()
    {
        $dosen = User::where('role', 'dosen')->whereNotNull('email_verified_at')->paginate(10);
        return view('maindashboard.index', ['dosenlist' => $dosen, 'content' => 'dosenlist', 'title' => 'Daftar Dosen']);
    }
}
