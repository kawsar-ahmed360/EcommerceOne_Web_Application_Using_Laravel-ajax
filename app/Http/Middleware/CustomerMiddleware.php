<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\user;
class CustomerMiddleware
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
          
          if (Auth::check() && Auth::user()->UserRole=='2') {
              
             return $next($request);
          }else{

            return redirect()->back();
          }

    }
}
