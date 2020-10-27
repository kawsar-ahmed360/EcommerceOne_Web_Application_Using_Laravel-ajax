<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\user;
class AdminMiddleware
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

        if (Auth::check() && Auth::user()->UserRole=='1') {
            
          return $next($request);
        }else{

            return redirect()->back();
        }
    }
}
