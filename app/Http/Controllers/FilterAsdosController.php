<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('maindashboard.index', ['asdoslist' => $asdosList, 'activity' => $activity, 'title' => 'Daftar Asisten Dosen', 'content' => 'viewAsdoswithFilter']);
    }
    public function matakuliahview($activity, $kampus, $jurusan,$semester, $gender)
    {
    
        if ($jurusan != "Bebas"){
            $strJurusan = "details.jurusan_id=".$jurusan;
        }else{
            $strJurusan = "details.jurusan_id != 0";
        }
        if ($semester != "Bebas") {
            $strSemester = "details.semester=" . $semester;
        } else {
            //bebas
            $strSemester = "details.semester != 0";
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
        return view('maindashboard.index', ['asdoslist' => $asdosList, 'activity' => $activity, 'title' => 'Daftar Asisten Dosen', 'content' => 'viewAsdoswithFilter']);
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
        return view('maindashboard.index', ['asdoslist' => $asdosList, 'activity' => $activity, 'title' => 'Daftar Asisten Dosen', 'content' => 'viewAsdoswithFilter']);
    }
}
