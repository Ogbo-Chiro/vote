<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        $status = auth()->user();
        if(isset($status)){
            if(auth()->user()->isAdmin == 1){
                return $next($request);
            }
            else{
            return back();
            }
        }
        else{
            return back();
        }
    }
}
