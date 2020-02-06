<?php

namespace App\Http\Controllers;

use App\Archive;
use App\Service;
use App\Activity;
use App\Prefer;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class AsdosController extends Controller
{
    public function profileAsdos()
    {
        //nanti tambahin logicnya
        $services = Service::all();
        $archive = Archive::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->first();
        
        $image_url = "";
        if (!$archive == null){
            $image_url = asset('storage/images/245');
            $image_url = $image_url . "/" . $archive->image_name;
                
        }else{
            //get random pic over the internet
            $image_url = "https://picsum.photos/200";
        }
        $prefer1 = DB::table('prefers')->selectRaw('concat(activity_id,"check") as arr')->where('user_id',Auth::user()->id)->get();        
        $preferArr = array();
        foreach($prefer1 as $pre){
            array_push($preferArr,$pre->arr);
        }
        return view('maindashboard.index', ['content' => 'profile', 'prefer' => $preferArr,'imageurl' =>$image_url, 'archive'=> $archive, 'services' => $services, 'title' => 'Daftar Ulang Lengkapi Profile']);
    }
    
    public function updatePreferAsdos(Request $request){
        
        $services = Service::all();
        $archive = Archive::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->first();
        
        $image_url = "";
        if (!$archive == null){
            $image_url = asset('storage/images/245');
            $image_url = $image_url . "/" . $archive->image_name;
                
        }else{
            //get random pic over the internet
            $image_url = "https://picsum.photos/200";
        }
        //hapus dulu semua data yang berkaitan dengan prefer akun ini
        $willbedeleted = Prefer::where('user_id',Auth::user()->id)->delete();
        $activities = Activity::all();
        $prefer = new Prefer;
        foreach($activities as $activity){
            $varName = $activity->id."check";
            
            if (isset($request->$varName)){
                Prefer::create(['user_id' => Auth::user()->id,'activity_id' => $activity->id]);

            }
        }
      //return $prefer;
        // return view('maindashboard.index', ['content' => 'profile', 'imageurl' =>$image_url, 'archive'=> $archive, 'services' => $services, 'title' => 'Daftar Ulang Lengkapi Profile']);
    return redirect()->route('profileAsdos')->with('successprefer','Berhasil memperbarui preferensi.');
    }
    public function viewAsdosBimbel(Request $request)
    {
        //belum ditambahin filter mata pelajaran
        //jadiin semuanya kecil
        $gender = strtolower($request->bimbelgender);
        $asdos = null;
        switch ($gender) {
            case "bebas":
                $asdos = User::with('detail')->whereHas('detail', function (Builder $query) {
                    $query->where([['users.role', '=', 'asdos'], ['status', '=', 'aktif'], ['prefer', 'like', '%bimbel%']]);
                })->simplePaginate();

                break;
            case "pria":
                $asdos = User::with('detail')->whereHas('detail', function (Builder $query) {
                    $query->where([['users.role', '=', 'asdos'], ['status', '=', 'aktif'], ['gender', '=', 'Pria'], ['prefer', 'like', '%bimbel%']]);
                })->simplePaginate();
                break;
            case "wanita":
                $asdos = User::with('detail')->whereHas('detail', function (Builder $query) {
                    $query->where([['users.role', '=', 'asdos'], ['status', '=', 'aktif'], ['gender', '=', 'Wanita'], ['prefer', 'like', '%bimbel%']]);
                })->simplePaginate();

                break;
        }

        return view('maindashboard.index', ['asdoslist' => $asdos, 'content' => 'viewAsdoswithFilter']);
    }
    
}
