<?php

namespace App\Http\Controllers;
use App\User;
use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('verified');
    }
    public function detil(){
        $user = Auth::user();
        return response()->json(['user'=>$user]);      
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
   
    // public function cobadelete($id)
    // {
    //     $activiti = Activity::findOrFail($id);
        
    //     if(!$activiti->trashed()){
    //       $activiti->delete();
    //       echo "sudah di happus";
    //     }else{
    //          $activiti->restore();
    //         echo "sudah di restore";
    //     }

    // }
   
}
