<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritaItems = Berita::latest()->get();
        return view('admin.berita.index', ['beritaItems' => $beritaItems]);
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar_thumbnail' => 'required|image|max:2048',
            'isi_konten' => 'required|string',
        ]);

        // Buat slug dari judul
        $validatedData['slug'] = Str::slug($request->judul);

        // Simpan gambar thumbnail
        $path = $request->file('gambar_thumbnail')->store('berita_thumbnails', 'public');
        $validatedData['gambar_thumbnail'] = $path;

        Berita::create($validatedData);

        return redirect()->route('admin.berita.index')->with('success', 'Berita baru berhasil dipublikasikan!');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', ['berita' => $berita]);
    }

    public function update(Request $request, Berita $berita)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar_thumbnail' => 'nullable|image|max:2048',
            'isi_konten' => 'required|string',
        ]);

        $validatedData['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar_thumbnail')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($berita->gambar_thumbnail);
            // Simpan gambar baru
            $path = $request->file('gambar_thumbnail')->store('berita_thumbnails', 'public');
            $validatedData['gambar_thumbnail'] = $path;
        }

        $berita->update($validatedData);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        // Hapus gambar thumbnail dari storage
        Storage::disk('public')->delete($berita->gambar_thumbnail);
        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus.');
    }
}