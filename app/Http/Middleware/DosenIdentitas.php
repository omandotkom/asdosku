<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Detail;

class DosenIdentitas
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
        $auth = Auth::user();

        $detail = Detail::where('user_id',$auth->id)->first();
        // dd($detail);
         if ($detail->identitas ==null){
            return redirect()->route('dosen-identitas-lengkap');
        }
        
        return $next($request);
    }
}
