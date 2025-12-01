<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilamentAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        // Allow access to login page without authentication
        if ($request->routeIs('filament.admin.pages.login')) {
            return $next($request);
        }

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('filament.admin.pages.login');
        }

        return $next($request);
    }
}

