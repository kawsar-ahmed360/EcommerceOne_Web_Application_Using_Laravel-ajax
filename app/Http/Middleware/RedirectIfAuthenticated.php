<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
// use Auth;
use App\user;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if (Auth::user()->UserRole=='1') {
                
                return redirect('/home');
            }elseif(Auth::user()->UserRole=='2'){

                return redrect('/customer_dashbord');
            }elseif(Auth::user()->UserRole=='3'){
             
              return redrect('/home');

            }

        }

        return $next($request);
    }
}
