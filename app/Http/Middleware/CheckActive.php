<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
class CheckActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->status == 'belum_aktif') {
            if (Auth::user()->archive->complete == false){
                return redirect()->route("profileAsdos");
            }
            return redirect()->route('notactive');
        } else if (Auth::user()->status == "gagal") {
           // return redirect()->route('gagal');
           //return view('auth.rejected');
           return redirect()->route('rejected');
        }
        return $next($request);
    }
}
