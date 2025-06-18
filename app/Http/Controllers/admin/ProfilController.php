<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- Import Storage untukelola file

class ProfilController extends Controller
{
    public function edit()
    {
        // Logika ini tetap sama, mengambil data profil atau membuat objek baru jika kosong
        $profil = Profil::firstOrCreate(['id' => 1]);
        return view('admin.profil.edit', ['profil' => $profil]);
    }

    public function update(Request $request)
    {
        // Aturan validasi, 'foto' sekarang divalidasi sebagai gambar
        $validatedData = $request->validate([
    'nama' => 'required|string|max:50',
    'tentang' => 'required|string',
    'visi' => 'required|string',
    'misi' => 'required|string',
    'program' => 'required|string',
    'magang' => 'nullable|string',
    'kuliah' => 'nullable|string',
    'travel' => 'nullable|string',
    'eks_korea' => 'nullable|string',
    'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);

        $profil = Profil::firstOrCreate(['id' => 1]);

        // ==========================================================
        // ===== LOGIKA UPLOAD FILE BARU DITAMBAHKAN DI SINI =====
        // ==========================================================
        if ($request->hasFile('foto')) {
            // 1. Hapus foto/logo lama jika ada
            if ($profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }

            // 2. Simpan foto baru ke folder 'profil_images' dan dapatkan path-nya
            $path = $request->file('foto')->store('profil_images', 'public');

            // 3. Masukkan path foto baru ke data yang akan disimpan
            $validatedData['foto'] = $path;
        }

        // Update database dengan semua data yang sudah divalidasi
        $profil->update($validatedData);

        return redirect()->route('admin.profil.edit')->with('success', 'Data profil berhasil diperbarui!');
    }
}