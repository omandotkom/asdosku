<?php

namespace App\Http\Controllers;

use App\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CostController extends Controller
{
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nominalcost' => 'required|numeric|',
            'keterangancost' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response('Gagal, belum lengkap atau format salah.',400);
        }
        
        
   // return $request;    
        $cost = new Cost;
        $cost->nominal = $request->nominalcost;
        $cost->keterangan = $request->keterangancost;
        $cost->transaction_id = $id;
        if ($request->hasFile('buktipembelian')){
            $path = $request->file('buktipembelian')->store('bukticost/ts'.$id, 'public');
        
            //$path = $request->buktipembelian->store('images/costhistory/transaction'.$id);
            $cost->filepath = $path;
        }
        $cost->save();
        if ($cost){
            return response('Berhasil menambahkan biaya tambahan.',200);
        }else{
            return response('Gagal menambahkan biaya tambahan.',400);
        }
    }
    public function sumcost($id){
        $cost = Cost::where('transaction_id',$id)->sum('nominal');
        return $cost;
    }
    public function delete($id){
        $cost = Cost::findOrFail($id);
        $cost->delete();
        return back();
    }
}

