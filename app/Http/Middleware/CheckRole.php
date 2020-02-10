<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Log;
class CheckRole
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
        switch (Auth::user()->role) {
            case "hrd":
                return redirect()->route('indexhrd');
                break;
            case "asdos":
                //cek apabila sudah lengkapi profile
                if (is_null(Auth::user()->second_register) || Auth::user()->second_register != true){
                    return redirect()->route('profileAsdos');
                }
                break;
            case "operational":
                return redirect()->route('indexoperational');
            break;

            default:
                return $next($request);
            break;
        }
    }
}
