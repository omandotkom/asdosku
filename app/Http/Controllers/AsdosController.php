<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AsdosController extends Controller
{
    public function viewAsdosBimbel(Request $request)
    {
        //belum ditambahin filter mata pelajaran
        //jadiin semuanya kecil
        $gender = strtolower($request->bimbelgender);
        $asdos = null;
        switch($gender){
            case "bebas" :
                $asdos = User::whereHas('detail', function (Builder $query) {
                    $query->where([['users.role', '=', 'asdos'],['status','=','aktif'], ['prefer', 'like', '%bimbel%']]);
                })->simplePaginate();
                Log::debug($gender);
                Log::debug($asdos);    
        break;
            case "pria" :
                $asdos = User::whereHas('detail', function (Builder $query) {
                    $query->where([['users.role', '=', 'asdos'],['status','=','aktif'], ['gender', '=', 'Pria'], ['prefer', 'like', '%bimbel%']]);
                })->simplePaginate();
            break;
            case "wanita" :
                $asdos = User::whereHas('detail', function (Builder $query) {
                    $query->where([['users.role', '=', 'asdos'],['status','=','aktif'], ['gender', '=', 'Wanita'], ['prefer', 'like', '%bimbel%']]);
                })->simplePaginate();
            
            break;
        }
        
        //return $user;
        //return view('layouts.dosen.rowasdos',['asdoslist' => 'haa']);
        return view('maindashboard.index', ['asdoslist' => $asdos,'content'=>'viewAsdoswithFilter']);
    }
}
