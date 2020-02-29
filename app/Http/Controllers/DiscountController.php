<?php

namespace App\Http\Controllers;

use App\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DiscountController extends Controller
{
    public function checkdiscount($id){
        //check if specified discount exists
        $discount = Discount::where('id',$id)->where('status','aktif')->first();
        if ($discount === null){
            return response("Kode diskon tidak bisa digunakan.",404);
        }else{
            return $discount;
        }
    }
}
