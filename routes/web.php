<?php

use Illuminate\Support\Facades\Route;

// Import semua controller Admin
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SoalLatihanController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\BeritaController; // Versi Admin, namanya tetap
use App\Http\Controllers\Admin\ProgramController as AdminProgramController; 

// Import semua controller Front-End
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\GalleryController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\ProgramController;
use App\Http\Controllers\FrontEnd\SoalLatihanController as FrontSoalLatihanController;
use App\Http\Controllers\FrontEnd\BeritaController as FrontBeritaController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\FrontEnd\TestimoniController as FrontTestimoniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTE PUBLIK (FRONT-END) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/program-kami', [ProgramController::class, 'index'])->name('program.kami');
Route::get('/galeri-foto', [GalleryController::class, 'photos'])->name('gallery.photos');
Route::get('/galeri-video', [GalleryController::class, 'videos'])->name('gallery.videos');
Route::get('/hubungi-kami', [ContactController::class, 'index'])->name('contact.index');
Route::get('/soal-latihan', [FrontSoalLatihanController::class, 'index'])->name('soal.latihan.index');
Route::get('/profil-kami', function () { return view('pages.profil'); })->name('profil.kami');
Route::get('/program/{program}', [ProgramController::class, 'show'])->name('program.show');

// === RUTE BARU UNTUK BERITA (menggunakan nama alias) ===
Route::get('/berita', [FrontBeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [FrontBeritaController::class, 'show'])->name('berita.show');

Route::get('/tulis-testimoni', [FrontTestimoniController::class, 'create'])->name('testimoni.create');
Route::post('/tulis-testimoni', [FrontTestimoniController::class, 'store'])->name('testimoni.store');


// =======================================================
// --- RUTE ADMIN ---
// =======================================================

// Grup untuk Login Admin (Publik)
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

// Grup untuk Dashboard & Fitur Admin (Terlindungi)
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil', [ProfilController::class, 'update'])->name('profil.update');
    
    Route::resource('media', MediaController::class)->except(['show']);
    
    Route::get('/info-pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::post('/info-pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    Route::resource('soal-latihan', SoalLatihanController::class)->except(['show']);
    
    Route::get('/pengaturan-kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::post('/pengaturan-kontak', [KontakController::class, 'store'])->name('kontak.store');
    
    Route::get('/ganti-password', [AccountController::class, 'showChangePasswordForm'])->name('account.password.edit');
    Route::post('/ganti-password', [AccountController::class, 'updatePassword'])->name('account.password.update');
    
    Route::resource('programs', AdminProgramController::class)->except(['show']);
    
    // Rute untuk Berita (menggunakan BeritaController versi Admin)
    Route::resource('berita', BeritaController::class)->except(['show'])->parameters([
        'berita' => 'berita'
    ]);

    Route::get('/testimoni', [\App\Http\Controllers\Admin\TestimoniController::class, 'index'])->name('testimoni.index');
Route::get('/testimoni/{testimoni}/edit', [\App\Http\Controllers\Admin\TestimoniController::class, 'edit'])->name('testimoni.edit');
Route::put('/testimoni/{testimoni}', [\App\Http\Controllers\Admin\TestimoniController::class, 'update'])->name('testimoni.update');
Route::delete('/testimoni/{testimoni}', [\App\Http\Controllers\Admin\TestimoniController::class, 'destroy'])->name('testimoni.destroy');
Route::patch('/testimoni/{testimoni}/approve', [\App\Http\Controllers\Admin\TestimoniController::class, 'approve'])->name('testimoni.approve');
Route::patch('/testimoni/{testimoni}/reject', [\App\Http\Controllers\Admin\TestimoniController::class, 'reject'])->name('testimoni.reject');
});
