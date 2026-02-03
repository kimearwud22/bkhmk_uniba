<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\QuestionnaireController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/gallery', [GalleryController::class, 'pageindex'])->name('gallery.pageindex');
Route::get('/humas-kerjasama', [PublicController::class, 'showBkhmkHumas'])->name('humas.bkhmk');
Route::get('/galeri-organisasi', [PublicController::class, 'showBkhmkOrganization'])->name('mahasiswa.bkhmk');
Route::get('/prestasi-mahasiswa', [PublicController::class, 'showBkhmkPrestasi'])->name('prestasi.bkhmk');
Route::get('/layanan-karir-kesehatan', [PublicController::class, 'showBkhmkLayanan'])->name('layanan.bkhmk');
Route::get('/unibaopen/daftar', function () {
    return view('page.unibaopen');
})->name('unibaopen.daftar');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', [GalleryController::class, 'dashbord'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/test-admin', function () {
    return 'ADMIN ACCESS GRANTED!';
})->middleware(['auth', 'role:admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard-mahasiswa', [GalleryController::class, 'dashbordMahasiswa'])->name('dashboard.user');
    Route::get('/data-diri', [ProfileController::class, 'editUser'])->name('profile.user.edit');
    Route::put('/data-diri/update', [ProfileController::class, 'updateUser'])->name('profile.user.update');
    Route::get('/form-questionnaire', [QuestionnaireController::class, 'showForm'])->name('questionnaire.show1');
    Route::match(['put', 'post'], '/questionnaire/submit', [QuestionnaireController::class, 'submitOrUpdate'])->name('questionnaire.submit');
    Route::middleware(['role:user-admin'])->group(function () {
        Route::get('/admin', function () {
            return view('admin.index'); // Halaman admin
        })->name('admin.index');
        Route::get('/dashboard', [GalleryController::class, 'dashbord'])->name('dashboard');
        Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('/admin/alumni-reports', [QuestionnaireController::class, 'reportAlumni'])->name('admin.alumni.reports');
    });
});

require __DIR__ . '/auth.php';
