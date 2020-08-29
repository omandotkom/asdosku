<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
class FilterAsdosController extends Controller
{
    public function bimbinganbelajarview($activity, $gender, $domisili)
    {
        // dd($domisili);
        $gender = strtolower($gender);
        if ($gender == "bebas") {
            $strWhere = "details.gender != 'Bebas'";
        } else {
            $strWhere = "details.gender = '" . $gender . "'";
        }
        if($domisili=="bebas"){
            $domisili="";
        }

        $asdosList = DB::table('prefers')->select("users.id", "users.name", 'rates.rating', "kampus.name as kampus",'details.domisili', "details.gender", 'activities.harga')
            ->join('users', 'prefers.user_id', 'users.id')
            ->join('details', 'prefers.user_id', 'details.user_id')
            ->join('kampus', 'details.kampus_id', 'kampus.id')
            ->leftJoin('rates', 'prefers.user_id', 'rates.user_id')
            ->join('activities', 'prefers.activity_id', 'activities.id')
            ->where('prefers.activity_id', $activity)
            ->where('details.status','aktif')
            ->where('users.status', 'aktif')
            ->where('details.domisili',$domisili)

            ->whereRaw($strWhere)
            ->inRandomOrder()
            ->paginate(8);
        
            $url = base64_encode(URL::full());
            // dd($url);
            // dd($asdosList);
            return view('maindashboard.index', ['asdoslist' => $asdosList, 'activity' => $activity, 'title' => 'Daftar Asisten', 'content' => 'viewAsdoswithFilter','currenturl'=>$url]);
    }
    public function matakuliahview($activity, $kampus, $jurusan,$semester, $gender,$domisili)
    {
    
        if ($jurusan != "Bebas"){
            $strJurusan = "details.jurusan_id=".$jurusan;
        }else{
            $strJurusan = "details.jurusan_id != 0";
        }
        if ($semester != "Bebas") {
            $strSemester = "details.semester='" . $semester."'";
        } else {
            //bebas
            $strSemester = "details.semester != 'FREE'";
        }
        if ($kampus != "Bebas") {
            $strKampus = "details.kampus_id=" . $kampus;
        } else {
            //bebas
            $strKampus = "details.kampus_id != 0";
        }
        if ($gender != "Bebas") {
            $strGender = "details.gender = '" . $gender . "'";
        } else {
            $strGender = "details.gender != 'Bebas'";
        }
        $asdosList = DB::table('prefers')->select("users.id", "users.name", 'rates.rating', "kampus.name as kampus", "details.gender", 'activities.harga')->join('users', 'prefers.user_id', 'users.id')
            ->join('details', 'prefers.user_id', 'details.user_id')
            ->join('kampus', 'details.kampus_id', 'kampus.id')
            ->join('activities', 'prefers.activity_id', 'activities.id')
            ->leftJoin('rates', 'prefers.user_id', 'rates.user_id')
            ->where('prefers.activity_id', $activity)->whereRaw($strSemester)->whereRaw($strKampus)
            ->whereRaw($strJurusan)
            ->whereRaw($strGender)
            ->where('users.status', 'aktif')
            ->where('details.status','aktif')
            ->where('details.domisili',$domisili)
            ->inRandomOrder()
            ->paginate(8);
            $url = base64_encode(URL::full());
            return view('maindashboard.index', ['asdoslist' => $asdosList, 'activity' => $activity, 'title' => 'Daftar Asisten', 'content' => 'viewAsdoswithFilter','currenturl'=>$url]);
    }
    public function generalView($activity,$kampus,$jurusan,$domisili)
    {
        // dd($domisili);
        if ($jurusan != "Bebas"){
            $strJurusan = "details.jurusan_id=".$jurusan;
        }else{
            $strJurusan = "details.jurusan_id != 0";
        }
        if ($kampus != "Bebas") {
            $strKampus = "details.kampus_id=" . $kampus;
        } else {
            //bebas
            $strKampus = "details.kampus_id != 0";
        }

        if ($domisili != "bebas") {
            $strdomisili = "details.domisili=". '"'.$domisili.'"';
        } else {
            //bebas
            $strdomisili = "details.domisili != 'null'";
        }
        // dd($strdomisili);

        $asdosList = DB::table('prefers')->select("users.id", "users.name", "rates.rating", "kampus.name as kampus", "details.kampus_id", "details.gender", 'activities.harga')
            ->join('users', 'prefers.user_id', 'users.id')
            ->join('details', 'prefers.user_id', 'details.user_id')
            ->join('kampus', 'details.kampus_id', 'kampus.id')
            ->join('activities', 'prefers.activity_id', 'activities.id')
            ->leftJoin('rates', 'prefers.user_id', 'rates.user_id')
            ->where('prefers.activity_id', $activity)
            ->whereRaw($strKampus)
            ->whereRaw($strJurusan)
            ->where('users.status', 'aktif')
            ->where('details.status','aktif')
            ->whereRaw($strdomisili)
            ->inRandomOrder()
            ->paginate(8);
            $url = base64_encode(URL::full());
            return view('maindashboard.index', ['asdoslist' => $asdosList, 'activity' => $activity, 'title' => 'Daftar Asisten', 'content' => 'viewAsdoswithFilter','currenturl'=>$url]);
    }
    public function filterbyactivity($activity){
        $activity = Activity::find($activity);
        $asdosList = DB::table('prefers')->select("users.id", "users.name", "rates.rating", "kampus.name as kampus", "details.kampus_id", "details.gender", 'activities.harga')->join('users', 'prefers.user_id', 'users.id')
        ->join('details', 'prefers.user_id', 'details.user_id')
        ->join('kampus', 'details.kampus_id', 'kampus.id')
        ->join('activities', 'prefers.activity_id', 'activities.id')
        ->leftJoin('rates', 'prefers.user_id', 'rates.user_id')
        ->where('prefers.activity_id', $activity->id)->where('users.status', 'aktif')
        ->simplePaginate();
        $url= "#";
        return view('maindashboard.index', ['asdoslist' => $asdosList, 'activity' => $activity, 'title' => 'Daftar Asisten '.$activity->name, 'content' => 'viewAsdoswithFilter','currenturl'=>$url]);
    }
    public function showAll(){
        $asdosList = DB::table('users')->select("users.id", "users.name", "rates.rating", "kampus.name as kampus", "details.kampus_id", "details.gender")
        ->join('details', 'users.id', 'details.user_id')
        ->join('kampus', 'details.kampus_id', 'kampus.id')
        ->leftJoin('rates', 'users.id', 'rates.user_id')
        ->where('users.status', 'aktif')
        ->paginate(8);
        $url= "#";
        return view('maindashboard.index', ['asdoslist' => $asdosList, 'title' => 'Daftar Asisten ', 'content' => 'viewAsdoswithFilter','currenturl'=>$url]);
        
    }
    //new list asdos

    public function showAllNew(Request $request)
    {
        $strWhere = "u.name != 'null'";

        if($request->has("column") && $request->column == "nama"){
             $strWhere = "u.name LIKE '%".$request->keyword."%'";
        }
        if($request->has("column") && $request->column == "email"){
             $strWhere = "u.email LIKE '%".$request->keyword."%'";
        }
        if($request->has("column") && $request->column == "status"){
             $strWhere = "u.status = '".$request->keyword."'";
        }
        if($request->has("column") && $request->column == "wa"){
             $strWhere = "d.wa = '".$request->keyword."'";
        }
        if($request->has("column") && $request->column == "wa"){
             $strWhere = "d.wa = '".$request->keyword."'";
        }
        if($request->has("column") && $request->column == "kampus"){
             $strWhere = "k.name LIKE '%".$request->keyword."%'";
        }
        if($request->has("column") && $request->column == "jurusan"){
             $strWhere = "j.name LIKE '%".$request->keyword."%'";
        }
        // dd($strWhere);

        $users =  DB::table('users as u')
                    ->join('details as d','u.id','=','d.user_id')
                    ->join('kampus as k','d.kampus_id','k.id')
                    ->join('jurusans as j','d.jurusan_id','j.id')
                    ->select('u.id','u.name','u.email','u.status','d.wa','k.name as kampus','j.name as jurusan','d.domisili')
                    ->where('u.role','=','asdos')
                    ->whereRaw($strWhere)
                    ->paginate(10);
        return view('maindashboard.index', ['users' => $users, 'content' => 'viewAsdoswithFilterNew','title' => "Daftar Asdos"]);
    }
    public function showDetailAsdos($id)
    {
        $user =  DB::table('users as u')->where('u.id','=',$id)->first();
            $detail = DB::table('details')->where('user_id',$id)->first();
            $jurusan = DB::table('jurusans')->where('id',$detail->jurusan_id)->first();
            $kampus = DB::table('kampus')->where('id',$detail->kampus_id)->first();
            $data = DB::table('archives')->where('user_id',$id)->first();
             // dd($kampus);
            return view('maindashboard.index', ['user' => $user, 'detail'=>$detail,'jurusan'=>$jurusan, 'kampus'=>$kampus, 'data'=>$data, 'content' => 'asdosdetailview','title' => "Detail Asdos"]);
    }

    public function filterbycampus($kampus_id){
        //for marketing only
     $asdosList = DB::table("users")->select("users.*","details.kampus_id", "details.wa","details.gender","details.semester", "details.alamat","details.jurusan_id","kampus.name as kampus","jurusans.name as jurusan")
     ->join('details','users.id','details.user_id')
     ->join('kampus','details.kampus_id','kampus.id')
     ->join('jurusans','details.jurusan_id','jurusans.id')
     ->where('details.kampus_id',$kampus_id)
     ->where('users.status','aktif')
     ->paginate(20);
     $url = base64_encode(URL::full());
     return view('maindashboard.index', ['asdoslist' => $asdosList, 'title' => 'Daftar Asisten', 'content' => 'viewAsdoswithFilter','currenturl'=>$url]);
     }
}
