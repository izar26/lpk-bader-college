<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\media;
use App\Models\SoalLatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Data untuk kartu statistik (Total Keseluruhan)
        $adminName = Auth::guard('admin')->user()->username;
        $galleryCount = media::count();
        $soalCount = SoalLatihan::count();

        // ==========================================================
        // ===== LOGIKA BARU UNTUK WIDGET AKTIVITAS TERBARU =====
        // ==========================================================

        // 1. Hitung SEMUA data yang dibuat HARI INI untuk ditampilkan sebagai angka
        $galleryCountToday = media::whereDate('created_at', today())->count();
        $soalCountToday = SoalLatihan::whereDate('created_at', today())->count();

        // 2. Ambil HANYA 3 data paling baru untuk ditampilkan sebagai daftar
        $latestThreePhotos = media::latest()->take(3)->get();
        $latestThreeSoal = SoalLatihan::latest()->take(3)->get();
        
        // Kirim semua data yang sudah disiapkan ke view
        return view('admin.dashboard', [
            'adminName' => $adminName,
            'galleryCount' => $galleryCount,
            'soalCount' => $soalCount,
            'galleryCountToday' => $galleryCountToday, // <- Total hari ini
            'soalCountToday' => $soalCountToday,   // <- Total hari ini
            'latestThreePhotos' => $latestThreePhotos, // <- Daftar 3 terbaru
            'latestThreeSoal' => $latestThreeSoal,   // <- Daftar 3 terbaru
        ]);
    }
}