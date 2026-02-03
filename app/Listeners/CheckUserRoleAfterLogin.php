<?php

// app/Listeners/CheckUserRoleAfterLogin.php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CheckUserRoleAfterLogin
{
    protected $request;

    // Inject Request dependency (jika Anda menggunakan versi Laravel/Breeze yang lebih baru)
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Login $event): void
    {
        $user = $event->user;

        // Pastikan user memiliki kolom 'role' dan middleware 'role' sudah terdaftar!
        if ($user->role === 'admin') {
            // Redirect Admin ke dashboard admin
            $redirectUrl = route('dashboard'); // Asumsi route admin Anda bernama 'dashboard'
            
            // Hentikan redirect default Breeze dengan melempar HTTP Response
            // Ini adalah trik yang diperlukan karena kita tidak bisa langsung memodifikasi redirect dari Listener
            
            // Kita akan menggunakan Redirect Response untuk mengarahkan pengguna
            // Catatan: Di beberapa versi Breeze, Listener harus melempar exception jika ingin mengintervensi redirect. 
            // Namun, pendekatan termudah adalah menggunakan rute yang berbeda.

            // Jika Anda ingin menggunakan rute yang berbeda, Anda bisa menggunakan Auth::intended()
            // Namun, karena Fortify/Breeze menangani redirect terakhir, kita pakai pendekatan yang lebih sederhana:
            
            if ($user->role === 'admin') {
                 // Langsung redirect jika admin
                 redirect(route('dashboard'))->send();
            }
        }
        
        // Untuk user biasa, biarkan Fortify/Breeze melakukan redirect default (biasanya ke RouteServiceProvider::HOME)
    }
}