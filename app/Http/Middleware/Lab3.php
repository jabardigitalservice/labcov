<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Lab3
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
        if(Auth::check() && Auth::user()->role == 4){
            return $next($request);
          }else {
          
            notify()->warning('Anda tidak memiliki Hak Akses !');
            return redirect('/');
             }
    }
}
