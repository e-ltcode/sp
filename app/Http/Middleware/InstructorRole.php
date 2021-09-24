<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class InstructorRole
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if($request->user()->role == "2" ){
            return $next($request);
        }
            return redirect()->route('login');
    }
}
