<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */

    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($role === 'admin' && !$user->isAdmin()){
                return redirect('/home');
            } else{
                return redirect('/normalhome'); // Redirect Normal users to their home page
            }
        }

    return $next($request);
    }
}
