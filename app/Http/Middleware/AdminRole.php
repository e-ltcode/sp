<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminRole
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
        // echo $request->user()->role;exit;
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if($request->user()->role != '1' && $request->user()->role != '-1'){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
