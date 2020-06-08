<?php

namespace App\Http\Controllers;

use App\Archive;
use App\Service;
use App\Activity;
use App\Bank;
use App\Campus;
use App\Comment;
use App\Prefer;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Jurusans;

class AsdosController extends Controller
{
    public function profileAsdos()
    {
        $archive = Archive::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->first();
        if ($archive->complete) {
            $services = Service::all();
            $image_url = "";
            if (!$archive == null) {
                $image_url = asset('storage/images/300');
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
            //$services = Service::with('activities')->get();
            //$campuses = Campus::all();
            //$jurusans = Jurusans::orderBy('name', 'asc')->get();
            $bank = Bank::where('user_id', Auth::user()->id)->first();
            $services = Service::with('activities')->get();
            $campuses = Campus::all();
            $jurusans = Jurusans::orderBy('name', 'asc')->get();

            return view('maindashboard.index', [
                'content' => 'profile',
                'bank' => $bank,
                'prefer' => $preferArr,
                'imageurl' => $image_url,
                'archive' => $archive,
                'services' => $services,
                'campuses' => $campuses,
                'jurusans' => $jurusans,
                'title' => 'Kegiatan dan Foto Profile ' . Auth::user()->id,
            ]);
        } else {
            return view('maindashboard.index', [
                'content' => 'documentprofile',
                'archive' => $archive,
                'title' => 'Unggah dokumen ' . Auth::user()->id,
            ]);
         }
    }

    public function updatePreferAsdos(Request $request)
    {

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
        Prefer::where('user_id', Auth::user()->id)->delete();
        $isInserted = false;
        $activities = Activity::all();
        foreach ($activities as $activity) {
            $varName = $activity->id . "check";

            if (isset($request->$varName)) {
                Prefer::create(['user_id' => Auth::user()->id, 'activity_id' => $activity->id]);
                if (!$isInserted) {
                    $isInserted = true;
                }
            }
        }
        if ($isInserted) {
            $user = User::find(Auth::user()->id);
            $user->second_register = true;
            $user->save();
        }
        //return $prefer;
        // return view('maindashboard.index', ['content' => 'profile', 'imageurl' =>$image_url, 'archive'=> $archive, 'services' => $services, 'title' => 'Daftar Ulang Lengkapi Profile']);
        return redirect()->route('profileAsdos')->with('successprefer', 'Berhasil memperbarui preferensi.');
    }
    public function viewFilteredAsdos($type, $activity, $gender = "Bebas", $semester = "Bebas", $kampus = "Bebas")
    {

        switch ($type) {

            case "bimbinganbelajar":

            case "matakuliah":
                break;
            default:
                $asdosList = DB::table('prefers')->select("users.id", "users.name", "rates.rating", "kampus.name as kampus", "details.kampus_id", "details.gender", 'activities.harga')->join('users', 'prefers.user_id', 'users.id')
                    ->join('details', 'prefers.user_id', 'details.user_id')
                    ->join('kampus', 'details.kampus_id', 'kampus.id')
                    ->join('activities', 'prefers.activity_id', 'activities.id')
                    ->leftJoin('rates', 'prefers.user_id', 'rates.user_id')
                    ->where('prefers.activity_id', $activity)->where('users.status', 'aktif')
                    ->simplePaginate();
                break;
        }
        return view('maindashboard.index', ['asdoslist' => $asdosList, 'activity' => $activity, 'title' => 'Daftar Asisten', 'content' => 'viewAsdoswithFilter']);
    }
    public function profile($id)
    {
        $user = DB::table('users')->select('users.name', 'details.*', 'rates.rating', 'archives.image_name', 'archives.cv_path', 'archives.another_file_path', 'jurusans.name as jurusan', 'kampus.name as kampus')
            ->selectRaw('now() as commentcount')
            ->selectRaw("null as commentlink")
            ->join('details', 'users.id', 'details.user_id')
            ->join('kampus', 'details.kampus_id', 'kampus.id')
            ->join('archives', 'users.id', 'archives.user_id')
            ->join('jurusans', 'details.jurusan_id', 'jurusans.id')
            ->leftJoin('rates', 'users.id', 'rates.user_id')
            ->where('users.id', $id)
            ->first();
        if (isset($user->image_name)) {
            $image_url = asset('storage/images/300');
            $image_url = $image_url . "/" . $user->image_name;
            $user->image_name = $image_url;
        } else {
            $image_url = "https://picsum.photos/200";
            $user->setAttribute('image_name', $image_url);
        }
        if (isset($user->cv_path)) {
            $user->cv_path = asset('storage/' . $user->cv_path);
        } else {
            $user->cv_path = "#";
        }

        if (isset($user->another_file_path)) {
            $user->another_file_path = asset('storage/' . $user->another_file_path);
        } else {
            $user->another_file_path = "#";
        }
        //filter rating biar ga null
        if (isset($user->rating)) {
            $user->rating = $user->rating . " / 5";
        } else {
            $user->rating = "-";
        }
        $user->commentcount = Comment::where('user_id', $id)->count() . " Komentar";
        $user->commentlink = route('viewcommentratingbyuser', $id);
        if ($user->semester != "Freshgraduate") {
            $user->semester = preg_replace('/(?<!\ )[A-Z]/', ' $0',  $user->semester);
            $smt = " " . substr($user->semester, -1);

            $user->semester = substr_replace($user->semester, "", -1) . $smt;
        }
        return response()->json($user);
    }
}
