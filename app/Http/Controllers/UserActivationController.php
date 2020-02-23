<?php

namespace App\Http\Controllers;

use App\Events\UserWasVerified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserActivationController extends Controller
{
    public function show(){
       event(new UserWasVerified(Auth::user()));
        return view('auth.notactive');
    }
}
