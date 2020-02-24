<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceActivitiesController extends Controller
{
    public function show(){
        $services = Service::with('activities')->get();
        
        return view('maindashboard.index',['services' => $services,'content' => 'servicelist','title' => 'Semua Layanan Kami']);
    }
}
