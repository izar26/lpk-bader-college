<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * READ: Menampilkan halaman utama dengan daftar semua media.
     */
    public function index()
    {
        $mediaItems = Media::latest()->get();
        return view('admin.media.index', ['mediaItems' => $mediaItems]);
    }

    /**
     * CREATE (Step 1): Menampilkan form untuk membuat media baru.
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * CREATE (Step 2): Menyimpan media baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:foto,video',
            'photo' => 'required_if:type,foto|image|max:2048', // Wajib jika tipe 'foto'
            'path' => 'required_if:type,video|url' // Path akan diisi link video jika tipe 'video'
        ]);

        $pathValue = null;
        if ($request->type == 'foto') {
            $pathValue = $request->file('photo')->store('gallery', 'public');
        } else {
            $pathValue = $request->path;
        }

        Media::create([
            'title' => $request->title,
            'type' => $request->type,
            'path' => $pathValue,
        ]);

        return redirect()->route('admin.media.index')->with('success', 'Media baru berhasil ditambahkan!');
    }

    /**
     * UPDATE (Step 1): Menampilkan form edit yang sudah terisi data media.
     */
    public function edit(Media $medium)
    {
        return view('admin.media.edit', ['media' => $medium]);
    }

    /**
     * UPDATE (Step 2): Memproses dan menyimpan perubahan ke database.
     */
    public function update(Request $request, Media $medium)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048', // Opsional saat update
            'path' => 'nullable|url'
        ]);

        $pathValue = $medium->path; // Path lama sebagai default

        if ($medium->type == 'foto' && $request->hasFile('photo')) {
            // Hapus foto lama, simpan yang baru
            Storage::disk('public')->delete($medium->path);
            $pathValue = $request->file('photo')->store('gallery', 'public');
        } elseif ($medium->type == 'video' && $request->path) {
            $pathValue = $request->path;
        }

        $medium->update([
            'title' => $request->title,
            'path' => $pathValue,
        ]);

        return redirect()->route('admin.media.index')->with('success', 'Media berhasil diperbarui!');
    }

    /**
     * DELETE: Menghapus media dari database.
     */
    public function destroy(Media $medium)
    {
        // Jika tipenya foto, hapus juga filenya dari storage
        if ($medium->type == 'foto') {
            Storage::disk('public')->delete($medium->path);
        }
        $medium->delete();
        return back()->with('success', 'Media berhasil dihapus.');
    }
}
