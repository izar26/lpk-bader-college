<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Program;
use App\Models\Testimoni; // <-- 1. Import model Testimoni
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        $latestBerita = Berita::latest()->take(3)->get();
        
        // 2. Ambil HANYA testimoni yang statusnya 'disetujui'
        $testimoni = Testimoni::where('status', 'disetujui')->latest()->get();

        return view('pages.home', [
            'programs' => $programs,
            'latestBerita' => $latestBerita,
            'testimoni' => $testimoni, // <-- 3. Kirim data ke view
        ]);
    }
}