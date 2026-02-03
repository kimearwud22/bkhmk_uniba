<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Pengecekan: Apakah user sudah login DAN nilai kolom 'role' di DB cocok dengan nilai yang diminta ('admin', 'user', dll.)
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }
        
        // Jika tidak cocok, redirect ke halaman publik (/)
        return redirect('/'); 
    }
}