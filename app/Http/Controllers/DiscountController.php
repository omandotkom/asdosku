<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
class DiscountController extends Controller
{
    public function post(Request $request)
    {

        return response($request);
    }
    public function checkdiscount(Request $request)
    {
        //check if specified discount exists
        $validator = Validator::make($request->all(), [
            'val' => 'required|numeric',
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response("Kode diskon tidak bisa digunakan.", 406);
        }


        $discount = Discount::where('id', $request->id)->where('status', 'aktif')->first();

        if ($discount === null) {
            return response("Kode diskon tidak bisa digunakan.", 406);
        } else {
           
            // check is value reach minimum order
            if ($request->val < $discount->min) {
                return response("Kode diskon tidak bisa digunakan, minimal transaksi Rp. " . $discount->min, 406);
            }
            $totaldiscount = $request->val * $discount->discount;
            $discount->discount = $totaldiscount;
            
            if ($totaldiscount > $discount->max){
                //jika melebihi max
                $discount->discount = $discount->max;
            }
            return $discount;
        }
    }
}
