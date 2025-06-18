<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoalLatihan;
use Illuminate\Http\Request;

class SoalLatihanController extends Controller
{
    // READ: Menampilkan semua link soal latihan
    public function index()
    {
        $links = SoalLatihan::latest()->get();
        return view('admin.soal_latihan.index', ['links' => $links]);
    }

    // CREATE: Menyimpan link baru ke database
    public function store(Request $request)
    {
        $request->validate([
    'title' => 'required|string|max:255',
    'link' => 'required|url'
]);
        SoalLatihan::create($request->all());
        return back()->with('success', 'Data soal latihan berhasil ditambahkan.');
    }

    // UPDATE (Step 1): Menampilkan form edit untuk satu link
    public function edit(SoalLatihan $soal_latihan)
    {
        return view('admin.soal_latihan.edit', ['link' => $soal_latihan]);
    }

    // UPDATE (Step 2): Memproses perubahan pada link
    public function update(Request $request, SoalLatihan $soal_latihan)
    {
        $request->validate([
    'title' => 'required|string|max:255',
    'link' => 'required|url'
]);
        $soal_latihan->update($request->all());
        return redirect()->route('admin.soal-latihan.index')->with('success', 'Data soal latihan berhasil diperbarui.');
    }

    // DELETE: Menghapus link dari database
    public function destroy(SoalLatihan $soal_latihan)
    {
        $soal_latihan->delete();
        return back()->with('success', 'Data soal latihan berhasil dihapus.');
    }
}