<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class LocalIDSession
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
        if ($request->session()->exists('local_id'))
        {
            return $next($request);
        }else{
            $local_id = Str::random(32).Str::random(64);
            $request->session()->put('local_id', $local_id);

            return $next($request);
        }
    }
}
