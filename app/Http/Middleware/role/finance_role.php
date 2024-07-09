<?php

namespace App\Http\Middleware\role;

use Closure;
use Illuminate\Http\Request;
use Auth;
class finance_role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role=='Purchasing_&_Finance'){
            return $next($request);
        }
        else
        {
            Auth::logout();
            return redirect('/login');  
        }
    }
}
    