<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Campus;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function show($activity, $asdos)
    {
        $asdos = User::with('archive','detail')->where('users.id',$asdos)->first();
        if (isset($asdos->archive->image_name)){
            $asdos->archive->image_name = asset('storage/images/245/'.$asdos->archive->image_name);
        }
        $kampus = Campus::select('name as kampus')->where('id',$asdos->detail->kampus_id)->first();
        $activity = Activity::with('service')->where('id', $activity)->first();
 	
        return view(
            'maindashboard.index',
            [
                'title' => 'Pemesanan',
                'asdos' => $asdos,
                'kampus' => $kampus,
                'activity' => $activity,
                'content' => 'order'
            ]
        );
    }
}
