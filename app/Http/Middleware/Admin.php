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
        if(auth()->user()->role == 'admin'or auth()->user()->role =='blogs_admin'or auth()->user()->role =='clinics_admin'or auth()->user()->role =='doctors_admin'){
            return $next($request);
        }
   
        return redirect('home')->with('error',"You don't have admin access.");
    }
}
