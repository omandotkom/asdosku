<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AsdosController extends Controller
{
    public function profileAsdos(){
        //nanti tambahin logicnya
        $services = Service::all();
        return view('maindashboard.index', ['content'=>'profile','services' => $services,'title' => 'Daftar Ulang Lengkapi Profile']);
 
    }
    public function viewAsdosBimbel(Request $request)
    {
        //belum ditambahin filter mata pelajaran
        //jadiin semuanya kecil
        $gender = strtolower($request->bimbelgender);
        $asdos = null;
        switch($gender){
            case "bebas" :
                $asdos = User::with('detail')->whereHas('detail', function (Builder $query) {
                    $query->where([['users.role', '=', 'asdos'],['status','=','aktif'], ['prefer', 'like', '%bimbel%']]);
                })->simplePaginate();
                
        break;
            case "pria" :
                $asdos = User::with('detail')->whereHas('detail', function (Builder $query) {
                    $query->where([['users.role', '=', 'asdos'],['status','=','aktif'], ['gender', '=', 'Pria'], ['prefer', 'like', '%bimbel%']]);
                })->simplePaginate();
            break;
            case "wanita" :
                $asdos = User::with('detail')->whereHas('detail', function (Builder $query) {
                    $query->where([['users.role', '=', 'asdos'],['status','=','aktif'], ['gender', '=', 'Wanita'], ['prefer', 'like', '%bimbel%']]);
                })->simplePaginate();
            
            break;
        }
        
        return view('maindashboard.index', ['asdoslist' => $asdos,'content'=>'viewAsdoswithFilter']);
    }
}
