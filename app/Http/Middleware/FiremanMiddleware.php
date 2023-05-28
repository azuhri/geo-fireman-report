<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FiremanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if(!$user->isFireman()) {
            return \redirect()->back()->with("errors","Anda tidak bisa mengakses fitur pemadam kebakaran");
        } else if($user->isNullLatLong() && \url()->current() != route('fireman.geolocation')) {
            return \redirect()->route('fireman.geolocation');
        }
        return $next($request);
    }
}
