<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Menampilkan halaman form pengaturan kontak.
     */
    public function index()
    {
        $kontak = Kontak::firstOrCreate(['id' => 1]);
        return view('admin.kontak.index', ['kontak' => $kontak]);
    }

    /**
     * Menyimpan perubahan pengaturan kontak.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lokasi' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'no_wa' => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
        ]);

        Kontak::updateOrCreate(['id' => 1], $validatedData);

        return back()->with('success', 'Pengaturan kontak berhasil diperbarui!');
    }
}