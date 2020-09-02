<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    public function forgot(Request $request)
    {

        $s = "#LupaPassword untuk email: ".$request->email;
        $url = "https://wa.me/6287719357776?text=" . rawurlencode($s);
        return redirect($url);
    }
    //use SendsPasswordResetEmails;
}
