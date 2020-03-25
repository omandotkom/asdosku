<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
class FilterAsdosController extends Controller
{
    public function bimbinganbelajarview($activity, $gender)
    {
        $gender = strtolower($gender);
        if ($gender == "bebas") {
            $strWhere = "details.gender != 'Bebas'";
        } else {
            $strWhere = "details.gender = '" . $gender . "'";
        }
        $asdosList = DB::table('prefers')->select("users.id", "users.name", 'rates.rating', "kampus.name as kampus", "details.gender", 'activities.harga')->join('users', 'prefers.user_id', 'users.id')
            ->join('details', 'prefers.user_id', 'details.user_id')
            ->join('kampus', 'details.kampus_id', 'kampus.id')
            ->leftJoin('rates', 'prefers.user_id', 'rates.user_id')
            ->join('activities', 'prefers.activity_id', 'activities.id')
            ->where('prefers.activity_id', $activity)->where('users.status', 'aktif')
            ->whereRaw($strWhere)->simplePaginate();
            $url = base64_encode(URL::current());
            return view('maindashboard.index', ['asdoslist' => $asdosList, 'activity' => $activity, 'title' => 'Daftar Asisten', 'content' => 'viewAsdoswithFilter','currenturl'=>$url]);
    }
    public function matakuliahview($activity, $kampus, $jurusan,$semester, $gender)
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
            ->whereRaw($strGender)->where('users.status', 'aktif')
            ->simplePaginate();
            $url = base64_encode(URL::current());
            return view('maindashboard.index', ['asdoslist' => $asdosList, 'activity' => $activity, 'title' => 'Daftar Asisten', 'content' => 'viewAsdoswithFilter','currenturl'=>$url]);
    }
    public function generalView($activity,$kampus,$jurusan)
    {
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

        $asdosList = DB::table('prefers')->select("users.id", "users.name", "rates.rating", "kampus.name as kampus", "details.kampus_id", "details.gender", 'activities.harga')->join('users', 'prefers.user_id', 'users.id')
            ->join('details', 'prefers.user_id', 'details.user_id')
            ->join('kampus', 'details.kampus_id', 'kampus.id')
            ->join('activities', 'prefers.activity_id', 'activities.id')
            ->leftJoin('rates', 'prefers.user_id', 'rates.user_id')
            ->where('prefers.activity_id', $activity)
            ->whereRaw($strKampus)
            ->whereRaw($strJurusan)->where('users.status', 'aktif')
            ->simplePaginate();
            $url = base64_encode(URL::current());
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
        ->simplePaginate();
        $url= "#";
        return view('maindashboard.index', ['asdoslist' => $asdosList, 'title' => 'Daftar Asisten ', 'content' => 'viewAsdoswithFilter','currenturl'=>$url]);
        
    }
    public function filterbycampus($kampus_id){
        //for marketing only
     $asdosList = DB::table("users")->select("users.*","details.kampus_id", "details.wa","details.gender","details.semester", "details.alamat","details.jurusan_id","kampus.name as kampus","jurusans.name as jurusan")
     ->join('details','users.id','details.user_id')
     ->join('kampus','details.kampus_id','kampus.id')
     ->join('jurusans','details.jurusan_id','jurusans.id')
     ->where('details.kampus_id',$kampus_id)
     ->where('users.status','aktif')
     ->simplePaginate(20);
     $url = base64_encode(URL::current());
     return view('maindashboard.index', ['asdoslist' => $asdosList, 'title' => 'Daftar Asisten', 'content' => 'viewAsdoswithFilter','currenturl'=>$url]);
     }
}
