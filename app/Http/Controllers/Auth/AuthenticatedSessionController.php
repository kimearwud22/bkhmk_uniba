<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Pastikan ini ada
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // Autentikasi terjadi di sini

        $request->session()->regenerate();

        // --- PERBAIKAN LOGIKA REDIRECT --

        if (Auth::user()->role === 'user-admin') {
            // Menggunakan redirect langsung tanpa intended() untuk memaksa tujuan
            return redirect(route('dashboard'));
        }

        if (Auth::user()->role === 'user') {
            // Redirect User ke halaman default publik (misal '/')
            return redirect(route('dashboard.user'));
        }

        // Fallback (jika role tidak ada)
        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
