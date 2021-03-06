<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
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
        Log::debug("content : ".$content);
        if ($content == "off"){
            return abort(403, 'Failed to open the site, please come back later. If you are currently viewing this page please contact the admin.');
        }
        return $next($request);
    }
}
