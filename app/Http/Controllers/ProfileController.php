<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\AlumniProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Menampilkan form edit profil
     */
    public function editUser()
    {
        // Pastikan user terautentikasi
        if (!Auth::check()) {
            return redirect('/login');
        }
        // Ambil user sebagai model Eloquent dengan eager loaded profile untuk menghindari pemanggilan metode yang tidak tersedia pada instance Auth
        $user = \App\Models\User::with('profile')->find(Auth::id());
        if (!$user) {
            return redirect('/login');
        }

        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Memproses pembaruan data profil
     */
    public function updateUser(Request $request)
    {
        // Pastikan kita memiliki instance Eloquent App\Models\User agar metode seperti update() tersedia
        $user = \App\Models\User::find(Auth::id());
        if (!$user) {
            return redirect('/login');
        }
        
        // Dapatkan profil pengguna, atau buat objek baru jika belum ada (untuk pendaftaran profil pertama)
        $profile = $user->profile ?? new AlumniProfile(['user_id' => $user->id]);

        // Validasi Data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'unique:alumni_profiles,nim,' . $profile->id . ',id'],
            'prodi' => ['required', 'string', 'max:100'],
            'tahun_angkatan' => ['required', 'numeric'],
            'tahun_lulus' => ['required', 'numeric'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-Laki', 'Perempuan'])],
            'no_telepon' => ['nullable', 'string', 'max:15'],
            'alamat' => ['nullable', 'string'],
            'berkas_cv' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'], // File maks 2MB
        ]);

        // 1. Update Data User (Nama)
        $user->update([
            'name' => $request->name,
        ]);

        // 2. Update Data Profile (Menggunakan updateOrCreate untuk kasus profil baru)
        $profileData = $request->only([
            'nim', 'prodi', 'tahun_angkatan', 'tahun_lulus', 
            'jenis_kelamin', 'no_telepon', 'alamat'
        ]);
        
        $user->profile()->updateOrCreate(['user_id' => $user->id], $profileData);
        
        // Ambil ulang objek profile yang sudah terupdate/terbuat
        $profile = $user->profile; 

        // 3. Penanganan Upload File CV
        if ($request->hasFile('berkas_cv')) {
            // Hapus file lama
            if ($profile->cv_path) {
                Storage::disk('public')->delete($profile->cv_path);
            }
            
            $path = $request->file('berkas_cv')->store('cv_alumni', 'public');
            $profile->cv_path = $path;
            $profile->save();
        }

        return redirect()->route('profile.user.edit')->with('status', 'Profil Anda berhasil diperbarui!');
    }
}
