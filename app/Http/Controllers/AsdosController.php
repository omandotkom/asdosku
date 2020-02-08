<?php

namespace App\Http\Controllers;

use App\Archive;
use App\Service;
use App\Activity;
use App\Campus;
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
        $archive = Archive::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->first();

        $image_url = "";
        if (!$archive == null) {
            $image_url = asset('storage/images/245');
            $image_url = $image_url . "/" . $archive->image_name;
        } else {
            //get random pic over the internet
            $image_url = "https://picsum.photos/200";
        }
        $prefer1 = DB::table('prefers')->selectRaw('concat(activity_id,"check") as arr')->where('user_id', Auth::user()->id)->get();
        $preferArr = array();
        foreach ($prefer1 as $pre) {
            array_push($preferArr, $pre->arr);
        }
        return view('maindashboard.index', ['content' => 'profile', 'prefer' => $preferArr, 'imageurl' => $image_url, 'archive' => $archive, 'services' => $services, 'title' => 'Daftar Ulang Lengkapi Profile']);
    }

    public function updatePreferAsdos(Request $request)
    {

        $services = Service::all();
        $archive = Archive::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->first();

        $image_url = "";
        if (!$archive == null) {
            $image_url = asset('storage/images/245');
            $image_url = $image_url . "/" . $archive->image_name;
        } else {
            //get random pic over the internet
            $image_url = "https://picsum.photos/200";
        }
        //hapus dulu semua data yang berkaitan dengan prefer akun ini
        $willbedeleted = Prefer::where('user_id', Auth::user()->id)->delete();
        $activities = Activity::all();
        $prefer = new Prefer;
        foreach ($activities as $activity) {
            $varName = $activity->id . "check";

            if (isset($request->$varName)) {
                Prefer::create(['user_id' => Auth::user()->id, 'activity_id' => $activity->id]);
            }
        }
        //return $prefer;
        // return view('maindashboard.index', ['content' => 'profile', 'imageurl' =>$image_url, 'archive'=> $archive, 'services' => $services, 'title' => 'Daftar Ulang Lengkapi Profile']);
        return redirect()->route('profileAsdos')->with('successprefer', 'Berhasil memperbarui preferensi.');
    }
    public function viewFilteredAsdos(Request $request, $type)
    {

        switch ($type) {

            case "bimbinganbelajar":
                $gender = strtolower($request->bimbelgender);
                if ($gender == "bebas") {
                    $asdosList = DB::table('prefers')->select("users.id", "users.name", "kampus.name as kampus", "details.gender", 'activities.harga')->join('users', 'prefers.user_id', 'users.id')
                        ->join('details', 'prefers.user_id', 'details.user_id')
                        ->join('kampus', 'details.kampus_id', 'kampus.id')
                        ->join('activities', 'prefers.activity_id', 'activities.id')
                        ->where('prefers.activity_id', $request->activity)->where('users.status', 'aktif')->simplePaginate();
                } else {
                    $asdosList = DB::table('prefers')->select("users.id", "users.name", "kampus.name as kampus", "details.gender", 'activities.harga')->join('users', 'prefers.user_id', 'users.id')
                        ->join('details', 'prefers.user_id', 'details.user_id')
                        ->join('kampus', 'details.kampus_id', 'kampus.id')
                        ->join('activities', 'prefers.activity_id', 'activities.id')
                        ->where('prefers.activity_id', $request->activity)->where('users.status', 'aktif')
                        ->where('details.gender', $request->bimbelgender)->simplePaginate();
                }
                break;
            case "matakuliah":
                //return $request;
                $strSemester = "";
                $strKampus = "";
                if ($request->semester != "Bebas") {

                    $strSemester = "details.semester=" . $request->semester;
                } else {
                    //bebas
                    $strSemester = "details.semester != 0";
                }
                if ($request->kampus != "Bebas") {
                    $strKampus = "details.kampus_id=" . $request->kampus;
                } else {
                    //bebas
                    $strKampus = "details.kampus_id != 0";
                }
                $gender = strtolower($request->gender);
                if ($gender == "bebas") {
                    $asdosList = DB::table('prefers')->select("users.id", "users.name", "kampus.name as kampus", "details.gender", 'activities.harga')->join('users', 'prefers.user_id', 'users.id')
                        ->join('details', 'prefers.user_id', 'details.user_id')
                        ->join('kampus', 'details.kampus_id', 'kampus.id')
                        ->join('activities', 'prefers.activity_id', 'activities.id')
                        ->where('prefers.activity_id', $request->activity)->whereRaw($strSemester)->whereRaw($strKampus)->where('users.status', 'aktif')
                        ->simplePaginate();
                } else {

                    $asdosList = DB::table('prefers')->select("users.id", "users.name", "kampus.name as kampus", "details.gender", 'activities.harga')->join('users', 'prefers.user_id', 'users.id')
                        ->join('details', 'prefers.user_id', 'details.user_id')
                        ->join('kampus', 'details.kampus_id', 'kampus.id')
                        ->join('activities', 'prefers.activity_id', 'activities.id')
                        ->where('prefers.activity_id', $request->activity)->whereRaw($strSemester)->whereRaw($strKampus)->where('users.status', 'aktif')
                        ->where('details.gender', $request->gender)->simplePaginate();
                    //return $request;

                }
                break;
            default:
                $asdosList = DB::table('prefers')->select("users.id", "users.name", "kampus.name as kampus", "details.kampus_id", "details.gender", 'activities.harga')->join('users', 'prefers.user_id', 'users.id')
                    ->join('details', 'prefers.user_id', 'details.user_id')
                    ->join('kampus', 'details.kampus_id', 'kampus.id')
                    ->join('activities', 'prefers.activity_id', 'activities.id')
                    ->where('prefers.activity_id', $request->activity)->where('users.status', 'aktif')
                    ->simplePaginate();
                break;
        }
        return view('maindashboard.index', ['asdoslist' => $asdosList,'activity' =>$request->activity, 'title' => 'Daftar Asisten Dosen', 'content' => 'viewAsdoswithFilter']);
    }
    public function profile($id){
        $user = DB::table('users')->select('users.name','details.*','archives.image_name','kampus.name as kampus')
        ->join('details','users.id','details.user_id')
        ->join('kampus','details.kampus_id','kampus.id')
        ->join('archives','users.id','archives.user_id')
        ->where('users.id',$id)
        ->first();
        if (isset($user->image_name)){
            $image_url = asset('storage/images/245');
            $image_url = $image_url . "/" . $user->image_name;
            $user->image_name = $image_url;
        }else{
            $image_url = "https://picsum.photos/200";
            $user->setAttribute('image_name',$image_url);
        }
        
        return response()->json($user);
    }
}
