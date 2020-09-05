<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Archive;
use Illuminate\Support\Facades\Validator;
class ArchiveController extends Controller
{
    public function show(){
        return view('auth.archive');
    }
    public function save(Request $request){
        if ($request->hasFile('cv')) {
            $validator = Validator::make($request->all(), [
                'cv' => 'file|mimes:pdf|max:5000',
            ]);
            if ($validator->fails()) {

                $error = $validator->errors()->first();
                return redirect()->back()->with(['error' => $error]);
            }
            $cv_path = $request->file('cv')->store('cv/' . Auth::user()->id, 'public');
            Archive::where('user_id',Auth::user()->id)->update(['cv_path' => $cv_path]);
            //$archive->cv_path = $cv_path;
        }
        if ($request->hasFile('nilai')) {
            $validator = Validator::make($request->all(), [
                'nilai' => 'file|mimes:pdf|max:10000',
            ]);
            if ($validator->fails()) {

                $error = $validator->errors()->first();
                return redirect()->back()->with(['error' => $error]);
            }
            $cv_path = $request->file('nilai')->store('nilai/' . Auth::user()->id, 'public');
            Archive::where('user_id',Auth::user()->id)->update(['another_file_path' => $cv_path]);
            //$archive->cv_path = $cv_path;
        }
        if ($request->hasFile('ktm')) {
            $validator = Validator::make($request->all(), [
                'ktm' => 'file|mimes:pdf|max:10000',
            ]);
            if ($validator->fails()) {

                $error = $validator->errors()->first();
                return redirect()->back()->with(['error' => $error]);
            }
            $ktm = $request->file('ktm')->store('ktm/' . Auth::user()->id, 'public');
            Archive::where('user_id',Auth::user()->id)->update(['ktm' => $ktm]);
            //$archive->cv_path = $cv_path;
        }
        if ($request->hasFile('identity')) {
            $validator = Validator::make($request->all(), [
                'identity' => 'file|mimes:pdf|max:10000',
            ]);
            if ($validator->fails()) {

                $error = $validator->errors()->first();
                return redirect()->back()->with(['error' => $error]);
            }
            $identity = $request->file('identity')->store('identity/' . Auth::user()->id, 'public');
            Archive::where('user_id',Auth::user()->id)->update(['identity' => $identity]);
            //$archive->cv_path = $cv_path;
        }
        $arc = Auth::user()->archive;
        if (!is_null($arc->cv_path) && !is_null($arc->ktm) && !is_null($arc->identity) && !is_null($arc->another_file_path)){
            Archive::where('user_id',Auth::user()->id)->update(['complete' => true]);   
        }
        return redirect()->route('dashboard');
    }
}
