<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Applicant;
use Illuminate\Support\Facades\Auth;
use App\Bid;
use Illuminate\Support\Facades\Validator;
use App\Service;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function show()
    {
        $services = Service::all();
        return view('maindashboard.index', ['services' => $services, 'title' => 'Buat Lowongan Pekerjaan', 'currenturl' => "#", 'content' => 'showbidpage']);
    }
    public function activitiesbyservice($serviceid)
    {
        $activities = Activity::where('service_id', $serviceid)->orderBy('name', 'asc')->get();
        return $activities;
    }
    public function activitybyid($id)
    {
        $activity = Activity::where('id', $id)->first();
        return $activity;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keterangan' => ['required', 'min:20'],
            'orderqty' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        if (!isset($request->activities) || $request->activities < 1) {
            return back()->with(['error' => 'jenis kegiatan belum dipilih. Pastikan memilih Jenis Layanan kemudian pilih Jenis Kegiatan.']);
        }
        if (!isset($request->orderqty) || $request->orderqty < 1) {
            return back()->with(['error' => 'pastikan kuantitas pesanan di isi dan bernilai numerik.']);
        }
        //return back()->with(['error' => 'Pesan Error']);
        $activity = Activity::find($request->activities);
        $keterangan = $request->keterangan . " ( " . $request->orderqty . " " . $activity->satuan . " )";
        $bid = new Bid;
        $bid->service_id = $request->services;
        $bid->activity_id = $request->activities;
        $bid->quantity = $request->orderqty;
        $bid->keterangan = $keterangan;
        $bid->status = "active";
        $bid->user_id = Auth::user()->id;
        $bid->save();
        return redirect()->route('showmybids');
    }
    public function showUsersBids()
    {
        $bids = Bid::where('user_id', Auth::user()->id)->simplePaginate(20);
        $services = Service::all();

        return view('maindashboard.index', ['bids' => $bids, 'services' => $services, 'title' => 'Daftar Penawaran Saya', 'content' => 'showbidlist']);
    }
    public function showbids()
    {
        if (Auth::user()->role == "asdos") {
            $bids = Bid::where('status', 'active')->orderBy('created_at', 'desc')->simplePaginate(20);
        } else {
            $bids = Bid::orderBy('created_at', 'desc')->simplePaginate(20);
        }
        $services = Service::all();
        return view('maindashboard.index', ['bids' => $bids, 'services' => $services, 'title' => 'Daftar Lowongan Pekerjaan', 'content' => 'showbidlist']);
    }
    public function apply($id)
    {
        $applicant = Applicant::where('bid_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($applicant == null) {
            $app = new Applicant;
            $app->bid_id = $id;
            $app->user_id = Auth::user()->id;
            $app->save();
        }
        return back();
    }
    public function cancel($id)
    {
        $applicant = Applicant::where('bid_id', $id)->where('user_id', Auth::user()->id)->first();
        $applicant->delete();
        return back();
    }
    public function viewapplicants($id)
    {
        $asdoslist = Applicant::where('bid_id', $id)->simplePaginate(20);
        $url = "#";
        return view('maindashboard.index', ['asdoslist' => $asdoslist, 'bid' => $id, 'title' => 'Daftar Asisten ', 'content' => 'bidsapplicants', 'currenturl' => $url]);
    }
    public function showBidsByActivity($id)
    {
        if ($id == 0) {
            if (Auth::user()->role == "asdos") {
                $bids = Bid::where('status', 'active')->where('service_id', $id)->simplePaginate(20);
            } else {
                $bids = Bid::where('service_id', $id)->simplePaginate(20);
            };
            $title = Service::find($id)->name;
        } else {
            if (Auth::user()->role == "asdos") {
                $bids = Bid::where('status', 'active')->where('activity_id', $id)->simplePaginate(20);
            } else {
                $bids = Bid::where('activity_id', $id)->simplePaginate(20);
            }
            $title = Activity::find($id)->name;
        }
        $services = Service::all();
        return view('maindashboard.index', ['bids' => $bids, 'services' => $services, 'title' => 'Daftar Lowongan Pekerjaan ' . $title, 'content' => 'showbidlist']);
    }
}
