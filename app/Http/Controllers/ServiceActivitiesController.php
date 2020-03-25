<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ServiceActivitiesController extends Controller
{
    public function show()
    {
        if (Auth::user()->subrole == "mahasiswa") {
            $services = Service::with('activities')->where('services.id','asbimbinganbelajar')
            ->orWhere('services.id','aspenelitian')
            ->orWhere('services.id','asdesainer')
            ->get();
        } else {
            $services = Service::with('activities')->get();
        }

        return view('maindashboard.index', ['services' => $services, 'content' => 'servicelist', 'title' => 'Semua Layanan Kami']);
    }
}
