<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;

class RegisterMiddlewareF
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
        $content = Storage::get('.registerstatus.txt');
        if ($content == "off"){
            return abort(403, 'This site has been locked for some time, please come back later');
        }
        return $next($request);
    }
}
