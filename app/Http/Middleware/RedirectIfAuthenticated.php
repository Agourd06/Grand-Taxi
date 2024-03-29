<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (auth()->user()->isAdmin()) {
                    return redirect('/admin');
                } elseif (auth()->user()->isChauffeur()) {
                    return redirect('/chauffeur');
                } elseif (auth()->user()->isPassager()) {
                    return redirect('/passager');
                } else {
                    return redirect('/');
                }
            }
        }

        return $next($request);
    }
}
