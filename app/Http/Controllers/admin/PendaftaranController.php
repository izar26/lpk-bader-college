<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Persyaratan;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Menampilkan halaman form info pendaftaran.
     */
    public function index()
    {
        // Ambil data. Jika tabel kosong, buat baris baru agar tidak error.
        $persyaratan = Persyaratan::firstOrCreate(['id' => 1]);
        return view('admin.pendaftaran.index', ['persyaratan' => $persyaratan]);
    }

    /**
     * Menyimpan perubahan info pendaftaran.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'persyaratan_umum' => 'nullable|string',
            'persyaratan_admin' => 'nullable|string',
        ]);

        // Cari baris dengan id=1, lalu update atau buat baru jika belum ada.
        Persyaratan::updateOrCreate(
            ['id' => 1],
            $validatedData
        );

        return back()->with('success', 'Info pendaftaran berhasil diperbarui!');
    }
}