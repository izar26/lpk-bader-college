<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimoniController extends Controller
{
    /**
     * READ: Menampilkan semua testimoni untuk dimoderasi.
     */
    public function index()
    {
        $testimoni = Testimoni::latest()->get();
        return view('admin.testimoni.index', compact('testimoni'));
    }

    /**
     * CREATE & STORE sudah tidak ada, karena testimoni dibuat dari halaman publik.
     */

    /**
     * UPDATE (Step 1): Menampilkan form untuk mengedit teks testimoni.
     */
    public function edit(Testimoni $testimoni)
    {
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    /**
     * UPDATE (Step 2): Menyimpan perubahan teks testimoni.
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'isi_testimoni' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($testimoni->foto && File::exists(public_path('uploads/' . $testimoni->foto))) {
                File::delete(public_path('uploads/' . $testimoni->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'testimoni_photos';
            $file->move(public_path('uploads/' . $path), $filename);
            $validatedData['foto'] = $path . '/' . $filename;
        }

        $testimoni->update($validatedData);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    /**
     * DELETE: Menghapus testimoni secara permanen.
     */
    public function destroy(Testimoni $testimoni)
    {
        if ($testimoni->foto && File::exists(public_path('uploads/' . $testimoni->foto))) {
            File::delete(public_path('uploads/' . $testimoni->foto));
        }
        $testimoni->delete();
        return back()->with('success', 'Testimoni berhasil dihapus.');
    }
    
    /**
     * FUNGSI BARU: Untuk menyetujui testimoni.
     */
    public function approve(Testimoni $testimoni)
    {
        $testimoni->update(['status' => 'disetujui']);
        return back()->with('success', 'Testimoni telah disetujui dan akan tampil di halaman depan.');
    }
    
    /**
     * FUNGSI BARU: Untuk menolak testimoni.
     */
    public function reject(Testimoni $testimoni)
    {
        $testimoni->update(['status' => 'ditolak']);
        return back()->with('success', 'Testimoni telah ditolak.');
    }
}
