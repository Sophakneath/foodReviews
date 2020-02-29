<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
            if ( Auth::user()->role == "admin" || Auth::user()->role == "editor") 
            {
                return redirect('/adminReview');
            }
            
            if(Auth::user()->role == "advertiser")
            {
                return redirect('/adminAdvertisement');
            }

            if(Auth::user()->role == "author")
            {
                return redirect('/adminArticle');
            }
    
            return redirect('/myaccount');
        }

        return $next($request);
    }
}
