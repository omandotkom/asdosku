<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class AsdosController extends Controller
{
    public function viewAsdosBimbel($gender)
    {
        //belum ditambahin filter mata pelajaran
        //jadiin semuanya kecil
         $gender = strtolower($gender);
         $asdos=null;
         if ($gender == "bebas"){
             $asdos = DB::table('users')->join('details','users.detail_id','details.id')->
             where(['users.role' => 'asdos'])->where('details.prefer','like','%bimbel%')->simplePaginate();
             Log::debug($asdos);
             //return $asdos;
         }else{
            $asdos = DB::table('users')->join('details','users.detail_id','details.id')->
            where([['users.role','=', 'asdos'],['details.gender','=',$gender],
            ['details.prefer','like','%bimbel%']])->simplePaginate();
            Log::debug($asdos);
            //return $asdos;
         }
        //return $user;
        //return view('layouts.dosen.rowasdos',['asdoslist' => 'haa']);
        return view('maindashboard.index', ['asdoslist' => $asdos,'content'=>'viewAsdoswithFilter']);
    }
}
